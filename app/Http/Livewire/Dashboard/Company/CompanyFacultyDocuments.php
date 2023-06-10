<?php

namespace App\Http\Livewire\Dashboard\Company;

use App\Models\CompanyDocument;
use App\Services\DocumentFillService;
use App\View\Components\Layouts\Dashboard;
use Closure;
use Filament\Forms\ComponentContainer;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class CompanyFacultyDocuments extends Component implements HasTable
{

    use InteractsWithTable;

    protected $listeners = ['refresh' => '$refresh'];

    protected function getTableQuery(): Builder|Relation
    {
        return CompanyDocument::where('company_id', auth()->user()->company->id)->with('document');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('document.name')->searchable(),
            TextColumn::make('document.lang'),

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')
                ->mountUsing(fn (ComponentContainer $form, CompanyDocument $record) => $form->fill($record->data))
                ->action(function (CompanyDocument $record, array $data): void {
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
        return view('livewire.dashboard.company.company-faculty-documents')
            ->layout(Dashboard::class, ['title' => 'Faculty Documents']);
    }
}
