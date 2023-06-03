<?php

namespace App\Http\Livewire;

use App\Forms\Components\DocumentLayout;
use App\View\Components\Layouts\Dashboard;
use DOMDocument;
use DOMElement;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class Test extends Component implements HasForms
{
    use InteractsWithForms;

    // public $document = file_get_contents('/var/www/html/storage/app/documents/0BxmYv3QiFL5sAqdsXSbGIH5cU3Zhb-metaQ29udmVudGllUHJhY3RpY2EuZG9jeA==--no-header.html');
    protected $placeholderFields = [];
    public $newDoc;
    public $document;

    public $role0;
    public $input_type0;
    public function mount()
    {
        $this->document = file_get_contents('/var/www/html/storage/app/documents/fJHGe27CfWPc3WNMpOHt7UGBBbPRAP-metaVEVTVC5kb2N4--no-header.html');
        $this->form->fill([]);

        // dd($template->saveHTML());


        // Blade::render($template->saveHTML(), ['test'], deleteCachedView: true);
        // dd($this->document);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->registerListeners([
            'click-comp' => [
                function (Component $component): void {
                    dd('clicked');
                },
            ],
        ]);
    }


    protected function parseDom(): string
    {
        // DOM parser
        $docCopy = $this->document;
        $dom = new DOMDocument();
        $template = new DOMDocument;
        $template->loadHTML('<html></html>');
        $dom->loadHTML($docCopy);
        $head = $dom->getElementsByTagName('head')->item(0);
        $head = $template->importNode($head, true);
        $template->documentElement->appendChild($head);
        $body = $dom->getElementsByTagName('body')->item(0);
        $body = $template->importNode($body);
        $template->documentElement->appendChild($body);
        $body->appendChild($template->createTextNode('{{ $slot }}'));
        return $template->saveHTML();
    }

    protected function getFormSchema(): array
    {

        $dom = new DOMDocument();
        $dom->loadHTML($this->document);
        $body = $dom->getElementsByTagName('body')->item(0);
        $bodyHtml = $dom->saveHTML($body);

        $this->configurePlaceholders($bodyHtml);
        return [
            DocumentLayout::make('doc')
                ->setDocumentLayout($this->parseDom())
                ->setContent($this->newDoc)
                ->schema($this->placeholderFields)
            // ->schema([Placeholder::make('plc')->content(new HtmlString($bodyHtml))])
        ];
    }
    protected function configurePlaceholders(string $document): void
    {
        $this->newDoc = $document;
        $id = 0;
        $exploded = preg_split('/{{([^}]+)}}/', $document, 2);
        do {
            if (array_key_exists(1, $exploded)) {
                // array_push(
                //     $this->placeholderFields,
                //     Placeholder::make('text-' . $id)
                //         ->disableLabel()
                //         ->content(new HtmlString($exploded[0]))
                // );
                array_push(
                    $this->placeholderFields,
                    Card::make()
                        ->schema([
                            Select::make('role' . $id)
                                ->options([
                                    'stu' => 'Student',
                                    'fac' => 'Faculty Member',
                                    'com' => 'Company Representative',
                                    'men' => 'Mentor'
                                ])
                                ->required(),

                            Select::make('input_type' . $id)
                                ->options([
                                    'txts' => 'Short Text (paragraph)',
                                    'txtl' => 'Long Text',
                                    'date' => 'Date',
                                    'sign' => 'Signature'
                                ])
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

        for ($i = 0; $i < $id; $i++) {

            $this->newDoc = preg_replace('/{{\s*(placeholder)\s*}}/', '{{ $placeholder_' . $i . ' }}', $this->newDoc, 1);
        }
    }

    public function submit()
    {
        // dd('here');
        $this->form->getState();
        dd($this->placeholderFields);
    }

    public function render()
    {
        return view('livewire.test')
            ->layout(Dashboard::class, ['title' => 'Test']);
    }
}
