<?php

namespace App\Http\Livewire\Document;

use App\Models\Company;
use App\Models\Document;
use App\Models\Student;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class DocumentAdd extends ModalComponent implements HasForms
{
    use InteractsWithForms;


    public $data;
    public $type;

    protected function getFormSchema(): array
    {
        return [

            Select::make('language')
                ->options([
                    'eng' => 'English',
                    'ro' => 'Romanian',
                ])
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('documents', null))
                ->required(),
            Select::make('documents')
                ->multiple()
                ->options(function (callable $get) {
                    if ($this->type == 'STU') {
                        return Document::where('lang', $get('language'))->whereJsonContains('fillable_by', $this->type)
                            ->orWhereJsonContains('fillable_by', 'MEN')
                            ->pluck('name', 'id');
                    } else if ($this->type == 'COM') {
                        return Document::where('lang', $get('language'))->whereJsonContains('fillable_by', $this->type)
                            ->whereNot(function ($query) {
                                $query->whereJsonContains('fillable_by', 'STU');
                            })->pluck('name', 'id');
                    }
                })
                ->visible(fn (callable $get) => $get('language'))

                ->required(fn (callable $get) => $get('language'))
        ];
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    protected function initData($doc): array
    {
        $data = [];
        $placeholders = Document::where('id', $doc)->pluck('placeholders')->toArray()[0];
        foreach (array_values($placeholders) as $place) {
            $data[$place] = '';
        }
        return $data;
    }

    public function add()
    {

        $this->form->getState();

        if ($this->type == 'STU') {

            $documents = Student::find(auth()->user()->student->id)->documents();
        } else if ($this->type == 'COM') {

            $documents = Company::find(auth()->user()->company->id)->documents();
        }
        foreach ($this->data['documents'] as $doc) {
            $docData = $this->initData($doc);
            $documents->syncWithPivotValues($doc, ['data' => $docData], false);
        }

        $this->emit('closeModal');
        $this->emit('refresh');

        Notification::make()
            ->title('Document added successfully!')
            ->success()
            ->send();
        //         if($this->type == 'STU'){
        // redirect()->route('student.documents');
        //         }
        //         else if ($this->type == 'COM'){
        // redirect()->route('company.documents');
        //         }
        //         redirect()->route('company.documents');
    }

    public function render()
    {
        return view('livewire.document.document-add');
    }
}
