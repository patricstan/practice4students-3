<?php

namespace App\Http\Livewire\Guest;

use App\Models\DocumentStudent;
use App\Models\Student;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use LivewireUI\Modal\ModalComponent;

class EvaluationModal extends ModalComponent  implements HasForms
{
    use InteractsWithForms;


    public $data;

    public function getFormSchema(): array
    {
        return [
            TextInput::make('student_email')->label('Student Email')->required(),
            TextInput::make('student_pin')->label('Student Pin')->required()->password(),
        ];
    }

    public function submit()
    {
        $this->form->getState();
        $student = Student::with('user')->with('pin')->whereRelation('user', 'email', $this->data['student_email'])->whereRelation('pin', 'pin', $this->data['student_pin'])->with('documents')->first();
        if ($student) {
            if ($student->documents->isNotEmpty()) {
                $this->emit('openModal', 'document.document-fill', [
                    'doc_id' => DocumentStudent::where('document_id', $student->documents->toQuery()
                        ->whereJsonContains('fillable_by', 'MEN')
                        ->get()->pluck('id'))
                        ->where('student_id', $student->id)->pluck('id')->first(),
                    'type' => 'STU'
                ]);
            }
        } else {
            Notification::make()
                ->title('Invalid credentials!')
                ->danger()
                ->send();
        }
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function render()
    {
        return view('livewire.guest.evaluation-modal');
    }
}
