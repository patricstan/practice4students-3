<?php

namespace App\Http\Livewire;

use App\Forms\Components\DocumentLayout;
use App\Forms\Components\WizardNoPrev;
use App\Models\Document;
use App\Services\TemplateCreateService;
use App\View\Components\Layouts\Dashboard;
use Closure;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class Test3 extends Component implements HasForms
{
    use InteractsWithForms;

    // protected bool $showSecond = false;
    // protected string $headers = '<html></html>';
    // protected string $layout = '';

    public ?array $uploadData = null;
    public ?array $templateData;

    protected ?string $document = null;

    protected function getForms(): array
    {
        return [
            'uploadForm' => $this->makeForm()
                ->schema($this->uploadSchema())
                ->statePath('uploadData'),
            'templateForm' => $this->makeForm()
                ->schema($this->templateSchema())
                ->statePath('templateData')
        ];
    }

    public function mount()
    {
        $this->uploadForm->fill();
        $this->templateForm->fill();
    }


    public function handleUpload(): void
    {
        $this->uploadForm->getState();

        $document = TemplateCreateService::getHtmlWithoutHeaders(pathinfo(reset($this->uploadData['upload']), PATHINFO_BASENAME));

        // $this->headers = DocumentManipulation::getHeaders($document);

        // $this->layout = DocumentManipulation::makeLayout($document);
        // dd($this->layout);
        $this->templateData['editor'] = $document;
        // $set = fn (Closure $set) => $set('editor', $document);
        // dd($this->editor);
        // $set('editor', $document);

        // $this->showSecond = true;
    }

    public function submit()
    {
        $this->templateForm->getState();
        $placeholders = $this->getPlaceholders();
        $fillable_by = $this->getFillableBy($placeholders);
        $html = $this->getHtml($placeholders);
        $paths = TemplateCreateService::saveNewHtml(reset($this->uploadData['upload']), $html);
        TemplateCreateService::setFinalPlaceholders($paths);
        $record = [
            'name' => $this->templateData['name'],
            'base_path' => $paths[0],
            'html_path' => $paths[1],
            'fillable_by' => $fillable_by,
            'placeholders' => $placeholders,
            'lang' => $this->templateData['lang']
        ];
        Document::create($record);
        return redirect()->route('faculty.templates');
    }


    public function render()
    {
        return view('livewire.test3')
            ->layout(Dashboard::class, ['title' => 'Test 3']);
    }


    //////////////////////////////////////////////////////////////////////////////////////////////
    //
    // Schemas
    //
    //////////////////////////////////////////////////////////////////////////////////////////////

    protected function uploadSchema(): array
    {
        return [
            WizardNoPrev::make()
                ->schema([
                    Step::make('file_upload')
                        ->schema([
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
                        ])
                ])
                // ->visible(fn () => !$this->showSecond)

                ->submitAction(new HtmlString("<button type='submit' class='text-white bg-blue-700 hover:bg-blue-800
                focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600
                dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'>Upload Base File</button>"))
        ];
    }

    protected function templateSchema(): array
    {
        return [
            WizardNoPrev::make()
                ->schema([

                    Step::make('verify_poistion')
                        ->label('Verify Position')
                        ->description('Add / Remove placeholders and put them in the correct place')
                        ->schema([
                            TinyEditor::make('editor')
                                ->maxHeight(500)
                                ->minHeight(500)
                                ->label('')
                        ])->afterValidation(fn ($get) => $this->document = $get('editor')),

                    Step::make('config_placeholders')
                        ->label('Configure Placeholders')
                        ->schema(function () {
                            if ($this->document == null) {
                                return [];
                            } else {
                                $fields = $this->getConfigFields($this->document);
                                $this->document = $this->replacePlaceholders($this->document, count($fields));
                                return  [Grid::make(2)
                                    ->schema([
                                        Section::make('configurator')
                                            ->label('Configurator')
                                            ->schema($fields)
                                            ->columnSpan(1)
                                            ->extraAttributes(['class' => 'overflow-y-auto', 'style' => 'max-height:500px']),

                                        Placeholder::make('document_preview')
                                            ->label('')
                                            ->content(new HtmlString($this->document))
                                            ->extraAttributes(['class' => 'overflow-y-auto', 'style' => 'max-height:500px'])

                                    ])];
                            }
                        }),
                    // ->schema(function (Closure $get) {
                    //     if ($get('editor')) {


                    //         // $bodyHtml = DocumentManipulation::getBody($get('editor'));

                    //         $bodyHtml = $get('editor');
                    //         $fields = $this->getConfigFields($bodyHtml);
                    //         $replacedPlaceholders = $this->replacePlaceholders($bodyHtml, count($fields));
                    //         return [
                    //             Grid::make(2)
                    //                 ->schema([
                    //                     Section::make('configurator')
                    //                         ->label('Configurator')
                    //                         ->reactive()
                    //                         ->schema($fields)
                    //                         ->columnSpan(1)
                    //                         ->extraAttributes(['class' => 'overflow-y-auto', 'style' => 'max-height:500px']),

                    //                     Placeholder::make('document_preview')
                    //                         ->reactive()
                    //                         ->label('')
                    //                         ->content('LOL')
                    //                         ->extraAttributes(['class' => 'overflow-y-auto', 'style' => 'max-height:500px'])

                    //                 ])
                    //             // DocumentLayout::make('configurator')
                    //             //     // ->setDocumentLayout($this->layout)
                    //             //     ->setContent(DocumentManipulation::makeLayout($this->headers, $replacedPlaceholders))
                    //             //     ->schema($fields)
                    //         ];
                    //     } else return [];;
                    // }),

                    Step::make('doc_info')
                        ->label('Document Info')
                        ->description('Enter template information. This will allow users know what they fill in, and it will help
                    you keep track of all documents.')
                        ->schema(
                            [
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
                            ]
                        ),

                    // Step::make('placeholder_config')
                    //     ->label('Configure placeholders')
                    //     ->description('Add / Remove placeholders and configure them.')
                    //     ->schema([
                    //         Grid::make(3)
                    //             ->schema([
                    //                 Section::make('Configurator')
                    //                     ->schema(fn (Closure $get) => $this->getConfigFields($get('editor')))
                    //                     ->extraAttributes(['class' => 'overflow-y-auto', 'style' => 'max-height:500px'])
                    //                     ->columns(1)
                    //                     ->columnSpan(1),

                    //                 TinyEditor::make('editor')
                    //                     ->maxHeight(500)
                    //                     ->minHeight(500)
                    //                     ->reactive()
                    //                     ->label('')
                    //                     ->columnSpan(2),

                    //             ])
                    //     ])
                ])

                // ->visible(fn () => $this->showSecond)
                ->submitAction(new HtmlString("<button type='submit' class='text-white bg-blue-700 hover:bg-blue-800
                focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600
                dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'>Upload File</button>"))
        ];
    }


    //////////////////////////////////////////////////////////////////////////////////////////////
    //
    // Utilities
    //
    //////////////////////////////////////////////////////////////////////////////////////////////


    protected function getConfigFields(?string $document): array
    {
        if ($document == null) {
            return [];
        }
        $id = 0;
        $placeholderFields = [];
        $exploded = preg_split('/{{([^}]+)}}/', $document, 2);
        do {
            if (array_key_exists(1, $exploded)) {
                $placeholderFields['placeholder_' . $id] =
                    Fieldset::make('placeholder_' . $id)
                    ->id('placeholder_' . $id)
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
                    ->disableLabel();
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

            $body = preg_replace('/{{\s*(placeholder)\s*}}/', '{{ placeholder_' . $i . ' }}', $body, 1);
        }
        return $body;
    }


    private function getPlaceholders(): array
    {
        $placeholders = [];
        $idx = 0;
        foreach ($this->templateData as $key => $val) {
            if (str_contains($key, 'input_type')) {
                $plHolder = strtoupper($this->templateData['role_' . $idx] . '_' . $this->templateData['input_type_' . $idx] . '_' . $idx);
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
        }, $this->document);

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

use DOMDocument;

class DocumentManipulation
{
    public static function makeLayout(string $headers, string $document): string
    {

        $dom = new DOMDocument();
        $template = new DOMDocument;

        $template->loadHTML($headers);
        $dom->loadHTML($document);

        $body = $dom->getElementsByTagName('body')->item(0);
        $body = $template->importNode($body, true);
        $template->documentElement->appendChild($body);
        // $body->appendChild($template->createTextNode('{{ $slot }}'));
        return $template->saveHTML();
    }

    public static function getBody(string $document): string
    {

        $dom = new DOMDocument();
        $dom->loadHTML($document);
        $body = $dom->getElementsByTagName('body')->item(0);
        return  $dom->saveHTML($body);
    }

    public static function getHeaders(string $document): string
    {

        $dom = new DOMDocument();
        $template = new DOMDocument;
        $template->loadHTML('<html></html>');
        $dom->loadHTML($document);
        $head = $dom->getElementsByTagName('head')->item(0);
        $head = $template->importNode($head, true);
        $template->documentElement->appendChild($head);
        return $template->saveHTML();
    }
}
