<?php

namespace App\Http\Livewire\Document;

use App\Forms\Components\DocumentLayout;
use App\Models\CompanyDocument;
use App\Models\DocumentStudent;
use App\Services\DocumentFillService;
use App\Services\TemplateCreateService;
use DOMDocument;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\HtmlString;
use LivewireUI\Modal\ModalComponent;
use Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad;

class DocumentFill extends ModalComponent implements HasForms
{
    use InteractsWithForms;


    public DocumentStudent|CompanyDocument $document;
    public int $doc_id;
    public string $type;
    public ?array $data;

    public function mount()
    {
        if ($this->type == 'STU') {
            $this->document = DocumentStudent::find($this->doc_id);
        } else if ($this->type == 'COM') {
            $this->document = CompanyDocument::find($this->doc_id);
        }
        $this->form->fill($this->document->data);
    }

    protected function getFormSchema(): array
    {
        return (new DocumentFillService($this->document))->getFormSchema();
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    protected function saveState()
    {
        $this->form->getState();
        $newData = $this->document->data;
        foreach ($this->data as $key => $val) {
            if ($key != 'preview') {
                if ($val) {
                    $newData[$key] = $val;
                } else {
                    $newData[$key] = $this->document->data[$key];
                }
            }
        }
        $this->document->data = $newData;

        $this->document->save();
    }


    public function submit()
    {
        $this->saveState();

        $this->closeModal();
    }

    public function generatePDF()
    {
        $this->saveState();
        $placeholders = [];
        foreach ($this->document->data as $dataKey => $dataVal) {
            $explodedKey = explode('_', $dataKey);
            $placeholders['placeholder_' . $explodedKey[2]] = $dataVal;
        }
        // dd($placeholders);
        // dd(json_encode($placeholders));
        $pdfPath = TemplateCreateService::fillInAndGetPdf($this->document->document->base_path, json_encode($placeholders));
        return response()->file($pdfPath)->deleteFileAfterSend(true);
        $this->closeModal();
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function render()
    {
        return view('livewire.document.document-fill');
    }
}
