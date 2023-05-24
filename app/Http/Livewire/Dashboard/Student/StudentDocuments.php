<?php

namespace App\Http\Livewire\Dashboard\Student;

use App\Models\DocumentStudent;
use App\View\Components\Layouts\Dashboard;
use Closure;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class StudentDocuments extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return DocumentStudent::whereIn('student_id', auth()->user()->student->pluck('id'))->with('document')->whereRelation('document', 'type', 'student');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('document.name')->searchable()->label('Document Name'),
            TextColumn::make('document.lang')->label('Document Language'),

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->action(function ($record) {
                    $this->emit('show-doc', ['type' => 'student', 'newDoc' => $record->document_id, 'studentId' => auth()->user()->student->id, 'newHidden' => false]);
                })
        ];
    }

    protected function getTableRecordActionUsing(): ?Closure
    {
        return fn (): string => 'edit';
    }


    public function render()
    {
        return view('livewire.dashboard.student.student-documents')
            ->layout(Dashboard::class, ['title' => 'Documents']);
    }
}
