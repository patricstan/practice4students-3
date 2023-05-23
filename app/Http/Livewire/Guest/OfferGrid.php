<?php

namespace App\Http\Livewire\Guest;

use App\Models\Offer;
use App\View\Components\Layouts\GuestContent;
use Closure;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class OfferGrid extends Component implements HasTable
{
    use InteractsWithTable;

    protected $queryString = [
        'tableFilters'
    ];

    protected function getTableQuery(): Builder
    {
        return Offer::where('is_available', true)->with('company');
    }

    protected function getTableColumns(): array

    {

        return [
            View::make('components.guest.offer-card')
                ->components([

                    TextColumn::make('title')->searchable(),
                    TextColumn::make('company.company_name')
                ])
        ];
    }

    protected function getTableRecordActionUsing(): ?Closure
    {
        return fn (): string => 'cardClicked';
    }


    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('company_name')
                ->label('Company Name')
                ->relationship('company', 'company_name'),

            SelectFilter::make('city')
                ->multiple()
                ->options(function () {
                    return $this->getTableQuery()->pluck('city')->mapWithKeys(function ($item) {
                        $arr = [$item => $item];
                        unset($arr['']);
                        return $arr;
                    });
                }),

            SelectFilter::make('is_paid')
                ->label('Paid')
                ->options([
                    '1' => 'Yes',
                    '0' => 'No'
                ]),

            SelectFilter::make('work_location')
                ->label('Work Location')
                ->multiple()
                ->options(function () {
                    return $this->getTableQuery()->pluck('work_location')->mapWithKeys(function ($item) {
                        return [$item => $item];
                    });
                }),
            Filter::make('start_date')
                ->form([
                    DatePicker::make('start_from')
                        ->label('Start From'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['start_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('start_date', '>=', $date),
                        );
                })
            // Make link o filtered list from companies
            // allow student to apply here
        ];
    }

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }

    protected function getTableContentGrid(): ?array
    {
        return [
            'sm' => 1,
            'md' => 2
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [6, 12, 24, 36];
    }

    public function cardClicked($record)
    {
        $this->emit('openModal', 'guest.offer-modal', ['offer' => $record]);
    }

    public function isTableSearchable(): bool
    {
        return true;
    }



    public function render()
    {
        return view('livewire.guest.offer-grid')
            ->layout(GuestContent::class, ['title' => "Offers"]);
    }
}
