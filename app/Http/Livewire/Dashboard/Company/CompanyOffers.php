<?php

namespace App\Http\Livewire\Dashboard\Company;

use App\Models\Offer;
use App\View\Components\Layouts\Dashboard;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;
use Livewire\Event;

class CompanyOffers extends Component implements HasTable
{

    use InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return Offer::query()->where('company_id', auth()->user()->company->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('title')->searchable(),
            TextColumn::make('city'),
            TextColumn::make('is_available')
                ->label('Available')
                ->formatStateUsing(fn (string $state): string => $state ? 'Yes' : 'No'),

        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('is_available')
                ->label('Available')
                ->query(fn (Builder $query): Builder => $query->where('is_available', true)),
            SelectFilter::make('city')
                ->multiple()
                ->options(function () {
                    return $this->getTableQuery()->pluck('city')->mapWithKeys(function ($item) {
                        return [$item => $item];
                    });
                })
        ];
    }

    protected function getTableActions(): array
    {
        return [
            // Action::make('edit')
            //     ->url(fn (Offer $record): string => route('company.offers.edit', $record)),
            Action::make('edit')
                ->action(fn (Offer $record): Event => $this->emit('openModal', 'dashboard.company.offers.offer-edit', ['offer' => $record]))
                ->color('primary'),

            Action::make('delete')
                ->action(fn (Offer $record): string => $record->delete())
                ->requiresConfirmation()
                ->color('danger')
            // ->openUrlInNewTab()
        ];
    }

    public function isTableSearchable(): bool
    {
        return true;
    }
    public function render()
    {
        return view('livewire.dashboard.company.company-offers')
            ->layout(Dashboard::class, ['title' => 'Offers']);
    }
}
