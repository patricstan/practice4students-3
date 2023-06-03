<?php

namespace App\Http\Livewire;

use App\Forms\Components\DocumentLayout;
use App\Forms\Components\WizardNoPrev;
use App\Models\Document;
use App\Services\TemplateCreateService;
use App\View\Components\Layouts\Dashboard;
use Closure;
use DOMDocument;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class Test2 extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data;

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function getFormSchema(): array
    {
        return [
            WizardNoPrev::make([
                Step::make('file_upload')
                    ->label('File Upload')
                    ->schema(fn () => $this->getUploadSchema())
                    ->description('Upload a .docx document which will serve as a base for the template.')
                    ->afterValidation(fn (Closure $set) => $this->handleUpload(reset($this->form->getRawState()['upload']), $set)),
                Step::make('doc_info')
                    ->label('Document Info')
                    ->schema($this->getInfoSchema())
                    ->description('Enter template information. This will allow users know what they fill in, and it will help
                you keep track of all documents.'),
                Step::make('verify_position')
                    ->label('Verify Position')
                    ->schema($this->getPositionsSchema())
                    ->description('Remove or add placeholders as needed while also taking into account the double curly
                braces ( {{}} ). Keep in mind that it is very important to make sure the placeholders are in the correct spot.'),
                Step::make('Configure placeholders')
                    ->schema(function (Closure $get) {
                        if ($get('editor')) return $this->getConfigSchema($get);
                        else return [];;
                    })
                    ->afterValidation(fn () => $this->submit())
            ])
                ->submitAction(new HtmlString("<button type='submit' class='text-white bg-blue-700 hover:bg-blue-800
                focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600
                dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'>Upload File</button>")),



        ];
    }

    public function mount()
    {
        $this->form->fill();
    }

    public function submit()
    {
        $this->form->getState();
        $placeholders = $this->getPlaceholders();
        $fillable_by = $this->getFillableBy($placeholders);
        $html = $this->getHtml($placeholders);
        $paths = TemplateCreateService::saveNewHtml(reset($this->data['upload']), $html);
        TemplateCreateService::setFinalPlaceholders($paths);
        $record = [
            'name' => $this->data['name'],
            'base_path' => $paths[0],
            'html_path' => $paths[1],
            'fillable_by' => $fillable_by,
            'placeholders' => $placeholders,
            'lang' => $this->data['lang']
        ];
        dd($record);

        $this->form->model($record)->saveRelationships();
    }

    public function render()
    {
        return view('livewire.test2')
            ->layout(Dashboard::class, ['title' => 'Test']);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////
    //
    // Sub-Schemas
    //
    //////////////////////////////////////////////////////////////////////////////////////////////

    protected function getUploadSchema(): array
    {

        return [
            FileUpload::make('upload')
                ->label('')
                ->required()
                ->disk('local')
                ->directory('documents')
                ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                ->loadingIndicatorPosition('left')
                ->panelLayout('compact')
                ->removeUploadedFileButtonPosition('right')
                ->uploadButtonPosition('right')
                ->uploadProgressIndicatorPosition('left')
                ->reactive()
        ];
    }

    protected function getInfoSchema(): array
    {
        return [
            TextInput::make('name')
                ->unique(table: Document::class, column: 'name')
                ->required(),
            Select::make('lang')
                ->label('Document Language')
                ->options([
                    'eng' => 'English',
                    'ro' => 'Romanian',
                ])
                ->required(),
        ];
    }

    protected function getPositionsSchema(): array
    {
        return [
            TinyEditor::make('editor')
                ->maxHeight(500)
                ->minHeight(500)
                ->label('')
        ];
    }

    protected function getConfigSchema(Closure $get): array
    {
        $document = $get('editor');
        $dom = new DOMDocument();
        $dom->loadHTML($document);
        $body = $dom->getElementsByTagName('body')->item(0);
        $bodyHtml = $dom->saveHTML($body);

        // $bodyCopy = $bodyHtml;
        $fields = $this->getConfigFields($bodyHtml);
        $replacedPlaceholders = $this->replacePlaceholders($bodyHtml, count($fields));
        return [
            DocumentLayout::make('configurator')
                ->setDocumentLayout($this->generateLayout($document))
                ->setContent($replacedPlaceholders)
                ->schema($fields)
        ];
    }


    //////////////////////////////////////////////////////////////////////////////////////////////
    //
    // Utilities
    //
    //////////////////////////////////////////////////////////////////////////////////////////////

    protected function handleUpload(\Livewire\TemporaryUploadedFile $upload, $set): void
    {
        $tempFileName = $upload->getFilename();
        $tempFilePath = 'livewire-tmp/';
        TemplateCreateService::moveUploadFromTempFolder($tempFilePath . $tempFileName);
        $htmlFromDoc = TemplateCreateService::getHtmlWithoutHeaders($tempFileName);
        $set('editor', $htmlFromDoc);
    }


    protected function getConfigFields(string $document): array
    {
        $id = 0;
        $placeholderFields = [];
        $exploded = preg_split('/{{([^}]+)}}/', $document, 2);
        do {
            if (array_key_exists(1, $exploded)) {
                array_push(
                    $placeholderFields,
                    Fieldset::make('placeholder - ' . $id)
                        ->schema([
                            Select::make('role_' . $id)
                                ->options([
                                    'stu' => 'Student',
                                    'fac' => 'Faculty Member',
                                    'com' => 'Company Representative',
                                    'men' => 'Mentor'
                                ])
                                ->label('Role')
                                ->required(),

                            Select::make('input_type_' . $id)
                                ->options([
                                    'txts' => 'Short Text (paragraph)',
                                    'txtl' => 'Long Text',
                                    'date' => 'Date',
                                    'sign' => 'Signature'
                                ])
                                ->label('Input Type')
                                ->required()
                        ])
                        ->extraAttributes(['class' => 'py-16'])
                        ->disableLabel()
                        ->columns(1)
                );
                $exploded = preg_split('/{{([^}]+)}}/', $exploded[1], 2);
                $id += 1;
            } else {
                break;
            }
        } while (true);
        return $placeholderFields;
    }

    protected function replacePlaceholders(string $body, int $totalFieldsNum): string
    {

        for ($i = 0; $i < $totalFieldsNum; $i++) {

            $body = preg_replace('/{{\s*(placeholder)\s*}}/', '{{ $placeholder_' . $i . ' }}', $body, 1);
        }
        return $body;
    }


    protected function generateLayout(string $editorDocument): string
    {
        $dom = new DOMDocument();
        $template = new DOMDocument;
        $template->loadHTML('<html></html>');
        $dom->loadHTML($editorDocument);
        $head = $dom->getElementsByTagName('head')->item(0);
        $head = $template->importNode($head, true);
        $template->documentElement->appendChild($head);
        $body = $dom->getElementsByTagName('body')->item(0);
        $body = $template->importNode($body);
        $template->documentElement->appendChild($body);
        $body->appendChild($template->createTextNode('{{ $slot }}'));
        return $template->saveHTML();
    }

    private function getPlaceholders(): array
    {
        $placeholders = [];
        $idx = 0;
        foreach ($this->data as $key => $val) {
            if (str_contains($key, 'input_type')) {
                $plHolder = strtoupper($this->data['role_' . $idx] . '_' . $this->data['input_type_' . $idx] . '_' . $idx);
                array_push(
                    $placeholders,
                    $plHolder
                );
                $idx += 1;
            }
        }
        return $placeholders;
    }

    private function getHtml(array $placeholders): string
    {

        $html = preg_replace_callback('/(?<={{ )[^{}]+(?= }})/', function ($matches) use (&$placeholders) {
            return array_shift($placeholders);
        }, $this->data['editor']);

        return $html;
    }

    protected function getFillableBy(array $placeholders): array
    {
        $fillableBy = [];
        foreach ($placeholders as $pl) {
            $rle = explode('_', $pl, 2);
            if (!array_key_exists($rle[0], $fillableBy)) {
                array_push($fillableBy, $rle[0]);
            }
        }
        return $fillableBy;
    }
}
