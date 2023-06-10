<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\Models\Company;
use App\Models\CompanyDocument;
use App\View\Components\Layouts\Dashboard;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class FacultyCompanies extends Component implements HasTable
{
    use InteractsWithTable;


    protected function getTableQuery(): Builder|Relation
    {
        return Company::with('user')->with('documents');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('company_name')
                ->label('Company Name')
                ->searchable(),
            TextColumn::make('user.name')
                ->label('Representative Name')
                ->searchable(),
            TextColumn::make('user.email')
                ->label('Representative Email')
                ->searchable(),
            TextColumn::make('user.phone')
                ->label('Representative Phone')
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('documents')
                // action(fn ($record, $data) => $this->emit('doc-get', ['type' => 'student', 'newDoc' => $data, 'studentId' => $record->id, 'newHidden' => false]))


                ->action(function ($record, $data) {
                    // dd(DocumentStudent::where('document_id', $data['document_id'])->where('student_id', $record->id)->pluck('id')->first());
                    $this->emit('openModal', 'document.document-fill', [
                        'doc_id' => CompanyDocument::where('document_id', $data['document_id'])->where('company_id', $record->id)->pluck('id')->first(),
                        'type' => 'COM'
                    ]);
                })
                ->form(fn ($record) => [
                    Select::make('document_id')
                        ->label('Document')
                        ->options($record->documents->pluck('name', 'id'))
                        ->required(),
                ]),
        ];
    }

    // protected function getTableRecordActionUsing(): ?Closure
    // {
    //     return fn (): string => 'documents';
    // }

    public function render()
    {
        return view('livewire.dashboard.faculty.faculty-companies')
            ->layout(Dashboard::class, ['title' => 'Companies']);
    }
}
