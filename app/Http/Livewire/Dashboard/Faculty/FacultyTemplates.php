<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\Models\Document;
use App\View\Components\Layouts\Dashboard;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class FacultyTemplates extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {

        return Document::query();
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')->searchable(),
            TextColumn::make('base_path')
                ->label('Document Path')
                ->description('storage/app/documents/', 'above')
                ->formatStateUsing(fn (string $state): string => pathinfo($state, PATHINFO_BASENAME))
                ->wrap(),
            TextColumn::make('lang'),

        ];
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('lang')
                ->multiple()
                ->options(function () {
                    return $this->getTableQuery()->pluck('lang')->mapWithKeys(function ($item) {
                        return [$item => $item];
                    });
                })
        ];
    }

    protected function getTableActions(): array
    {
        return [

            Action::make('delete')
                ->requiresConfirmation()
                ->action(function (Document $record): void {
                    $htmlPath = $record->html_path;
                    $docPath = $record->base_path;
                    $record->delete();
                    unlink($htmlPath);
                    unlink($docPath);
                })
                ->color('danger')
        ];
    }

    public function isTableSearchable(): bool
    {
        return true;
    }

    public function render()
    {
        return view('livewire.dashboard.faculty.faculty-templates')
            ->layout(Dashboard::class, ['title' => 'Templates']);
    }
}
