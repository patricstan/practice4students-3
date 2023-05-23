<?php

namespace App\Http\Livewire\Guest;

use App\Models\Company;
use App\View\Components\Layouts\GuestContent;
use Closure;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CompanyGrid extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return Company::query();
    }

    protected function getTableColumns(): array

    {

        return [
            View::make('components.guest.company-card')
                ->components([
                    ImageColumn::make('logo'),
                    TextColumn::make('company_name')->searchable(),
                ])
        ];
    }

    protected function getTableRecordActionUsing(): ?Closure
    {


        return fn (): string => 'cardClicked';
    }


    protected function getTableContentGrid(): ?array
    {
        return [
            'xs' => 1,
            'sm' => 2,
            'md' => 3
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [6, 12, 24, 36];
    }

    public function cardClicked(Company $record)
    {
        $this->emit('openModal', 'guest.company-modal', ['company' => $record]);
    }

    public function isTableSearchable(): bool
    {
        return true;
    }


    public function render()
    {
        return view('livewire.guest.company-grid')
            ->layout(GuestContent::class, ['title' => 'Partenered Companies']);
    }
}
