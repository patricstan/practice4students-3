<?php

namespace App\Http\Livewire\Dashboard\Company\Offers;

use App\Models\Offer;
use Closure;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use LivewireUI\Modal\ModalComponent;

class OfferCreate extends ModalComponent implements HasForms
{
    use InteractsWithForms;
    use AuthorizesRequests;

    public $data;
    public $is_paid;

    public function mount(): void
    {
        $this->form->fill();
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make(
                [Grid::make(2)->schema([
                    TextInput::make('title')->required(),
                    DatePicker::make('start_date')->displayFormat('d/m/Y')->required(),
                    Textarea::make('description')->required()->columnSpanFull(),
                    Checkbox::make('is_paid')->label('Is Paid')->reactive()->columnSpanFull(),
                    TextInput::make('salary')->hidden(fn (Closure $get) => $get('is_paid') == false)->numeric(),
                    Select::make('currency')->hidden(fn (Closure $get) => $get('is_paid') == false)
                        ->options([
                            'eur' => 'EUR',
                            'ron' => 'RON'
                        ]),
                    Select::make('work_location')
                        ->label('Work Location')
                        ->reactive()
                        ->options([
                            'remote' => 'Remote',
                            'office' => 'Office',
                            'mixed' => 'Mixed'
                        ])
                        ->required()
                        ->columnSpanFull(),
                    TextInput::make('city')->visible(fn (Closure $get) => $get('work_location') != 'remote')
                        ->required(fn (Closure $get) => $get('work_location') != 'remote')->default(''),
                    TagsInput::make('skills')->required(),
                    Checkbox::make('is_available')->label('Is Available')->columnSpanFull()
                ])]

            )

        ];
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function create()
    {
        // $this->authorize('manage-offers');

        $this->form->getState();
        $this->data['company_id'] = auth()->user()->company->id;
        Offer::create($this->data);
        Notification::make()
            ->title('Offer added successfully!')
            ->success()
            ->send();
        redirect()->route('company.offers');
    }

    public function render()
    {
        return view('livewire.dashboard.company.offers.offer-create');
    }
}
