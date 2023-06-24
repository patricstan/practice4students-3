<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\Models\DocumentStudent;
use App\Models\Student;
use App\View\Components\Layouts\Dashboard;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class FacultyStudents extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return Student::with('user')->with('documents');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user.name')
                ->label('Student Name')
                ->searchable(),
            TextColumn::make('user.email')
                ->label('Student Email')
                ->searchable(),
            TextColumn::make('completed_practice')
                ->label('Practice Stage Status')
                ->formatStateUsing(fn (string $state): string => $state ? 'Completed' : 'Not Completed'),


        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('documents')
                // ->action(fn ($record, $data) => $this->emit('doc-get', ['type' => 'student', 'newDoc' => $data, 'studentId' => $record->id, 'newHidden' => false]))
                ->action(function ($record, $data) {
                    // return redirect()->route('document.fill', [

                    //     'doc_id' => DocumentStudent::where('document_id', $data['document_id'])
                    //         ->where('student_id', $record->id)->pluck('id')->first(),
                    //     'type' => 'STU'
                    // ]);
                    $this->emit('openModal', 'document.document-fill', [
                        'doc_id' => DocumentStudent::where('document_id', $data['document_id'])->where('student_id', $record->id)->pluck('id')->first(),
                        'type' => 'STU'
                    ]);
                })
                ->form(fn ($record) => [
                    Select::make('document_id')
                        ->label('Document')
                        ->options($record->documents->pluck('name', 'id'))
                        ->required(),
                ]),
            Action::make('ps_status')
                ->label('Change status')
                ->action(function ($record) {
                    $student = Student::find($record->id);
                    $student->update(['completed_practice' => !$record->completed_practice]);
                })
        ];
    }

    // protected function getTableRecordActionUsing(): ?Closure
    // {
    //     return fn (): string => 'documents';
    // }

    public function render()
    {
        return view('livewire.dashboard.faculty.faculty-students')
            ->layout(Dashboard::class, ['title' => 'Students']);
    }
}
