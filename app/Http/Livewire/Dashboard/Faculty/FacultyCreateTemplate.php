<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\Services\TemplateCreateService;
use App\Models\Document;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use LivewireUI\Modal\ModalComponent;

class FacultyCreateTemplate extends ModalComponent implements HasTable

{
    use InteractsWithTable;

    public $upload;
    public $upload_name;
    public $name;
    public $lang;
    public $type;
    public $fillable_by;
    public $document;

    public function mount()
    {
        $this->uploadForm->fill();
        $this->templateForm->fill();
    }


    protected function getUploadFormSchema(): array
    {
        return [

            FileUpload::make('upload')
                ->label('')
                ->required()
                ->disk('local')
                ->directory('documents')
                ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                ->storeFileNamesIn('upload_name')
                ->loadingIndicatorPosition('left')
                ->panelLayout('compact')
                ->removeUploadedFileButtonPosition('right')
                ->uploadButtonPosition('right')
                ->uploadProgressIndicatorPosition('left')
                ->afterStateUpdated(function () {
                    $this->uploadFile();
                })

        ];
    }

    protected function getTemplateFormSchema(): array
    {
        return [
            Wizard::make([
                Step::make('Base File Upload')
                    ->schema($this->getUploadFormSchema()),
                Step::make('Template Information')
                    ->schema([

                        TextInput::make('name')
                            ->unique(table: Document::class, column: 'name')
                            ->required(),
                        Select::make('type')
                            ->label('Document type')
                            ->options([
                                'student' => 'Student Portfolio Document',
                                'company' => 'Company Document',
                                'evaluation' => 'Evaluation Form'
                            ])
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('fillable_by', null))
                            ->required(),
                        Select::make('fillable_by')
                            ->label('Fillable by')
                            ->multiple()
                            ->options(function (callable $get) {
                                $type = $get('type');
                                if ($type == 'student')
                                    return [
                                        'student' => 'Student',
                                        'company' => 'Company representative',
                                        'faculty' => 'Faculty member'
                                    ];
                                else if ($type == 'company')
                                    return [
                                        'company' => 'Company representative',
                                        'faculty' => 'Faculty member'
                                    ];
                            })
                            ->visible(fn (callable $get) => $get('type') == 'student' || $get('type') == 'company')
                            ->required(fn (callable $get) => $get('type') == 'student' || $get('type') == 'company'),
                        Select::make('lang')
                            ->label('Document Language')
                            ->options([
                                'eng' => 'English',
                                'ro' => 'Romanian',
                            ])
                            ->required()
                    ]),

                Step::make('Template Data')
                ->schema([
                    Placeholder::make('Placeholder Structure')
                    ->content(new htmlstring ('<p>placeholders must have the following structure:
                            <b>{{ $RLE_TYPE_X }}</b> where: </p>
                            <p><b>RLE</b> = ROLE (<b>STU</b>, <b>COM</b>, <b>FAC</b>)</p>
                            <p><b>TYPE</b> = DATA (<b>DATE</b>, <b>SIGN</b>, <b>TXTS</b>, <b>TXTL</b>) </p>
                            <p><b>X</b> = POSITIVE INTEGER (<b>1</b>,<b>2</b>...) </p>')),

                    RichEditor::make('document')


                ])
            ])->submitAction(new HtmlString("<button type='submit' class='text-white bg-blue-700 hover:bg-blue-800
                focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600
                dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'>Create Template</button>"))
        ];
    }

    protected function getForms(): array
    {
        return [
            'uploadForm' => $this->makeForm()
                ->schema($this->getUploadFormSchema()),
            'templateForm' => $this->makeForm()
                ->schema($this->getTemplateFormSchema())
                ->model(Template::class),
        ];
    }


    public function uploadFile(): void
    {
        $this->uploadForm->getState();
        $this->document = TemplateCreateService::get_html_without_headers(pathinfo(reset($this->upload), PATHINFO_BASENAME));
        // $this->document = (new TemplateCreateService(reset($this->upload)))->get_html_without_headers();

    }


    public function createTemplate(): void
    {

            $this->templateForm->getState();
            $data = (new TemplateCreateService($this->upload_name))->create_placeholder_json($this->document);
            $paths = (new TemplateCreateService($this->upload_name))->save_file_and_update_template($this->document);
            Document::create([
                'name' => $this->name,
                'base_path' => $paths[0],
                'placeholders' => $data,
                'fillable_by' => $this->fillable_by,
                'type' => $this->type,
                'html_path' => $paths[1],
                'lang' => $this->lang,
            ]);
            Notification::make()
                ->title('Template created successfully!')
                ->success()
                ->send();
    }

    public static function modalMaxWidth(): string
{
    return '7xl';
}

    public function render()
    {
        return view('livewire.dashboard.faculty.faculty-create-template');
    }
}
