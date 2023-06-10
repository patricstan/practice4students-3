<?php

namespace App\Http\Livewire\Dashboard\Student;

use App\Models\Document;
use App\Models\DocumentStudent;
use App\Services\DocumentFillService;
use App\Tables\Columns\DocumentEditButton;
use App\View\Components\Layouts\Dashboard;
use Closure;
use Filament\Forms\ComponentContainer;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class StudentDocuments extends Component implements HasTable
{
    use InteractsWithTable;

    protected $listeners = ['refresh' => '$refresh'];


    protected function getTableQuery(): Builder|Relation
    {
        return DocumentStudent::whereIn('student_id', auth()->user()->student->pluck('id'))->with('document');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('document.name')->searchable()->label('Document Name'),
            TextColumn::make('document.lang')->label('Document Language'),
            // DocumentEditButton::make('id')->label('Document Action')

        ];
    }

    protected function getTableActions(): array
    {
        return [

            Action::make('edit')
                ->mountUsing(fn (ComponentContainer $form, DocumentStudent $record) => $form->fill($record->data))
                ->action(function (DocumentStudent $record, array $data): void {
                    $newData = $record->data;
                    foreach ($data as $key => $val) {
                        if ($val) {
                            $newData[$key] = $val;
                        } else {
                            $newData[$key] = $record->data[$key];
                        }
                    }
                    $record->data = $newData;
                    $record->save();
                })
                ->form(fn ($record) => (new DocumentFillService($record))->getFormSchema())
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
