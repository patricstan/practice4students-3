<?php

namespace App\Http\Livewire\Dashboard\Company;

use App\Models\OfferStudent;
use App\View\Components\Layouts\Dashboard;
use Closure;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class Applicants extends Component implements HasTable
{

    use InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return OfferStudent::whereIn('offer_id', auth()->user()->company->offers()->pluck('id'))
            ->with('offer')->with('student', fn ($q) => $q->with('user'));
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('offer.title')
                ->sortable()
                ->searchable(),
            TextColumn::make('student.user.name')
                ->label('Student Name')
                ->searchable(),
            TextColumn::make('student.user.email')
                ->label('Student Email')
                ->searchable(),
            TextColumn::make('status')
                ->sortable(),



        ];
    }

    protected function getTableActions(): array
    {
        return [

            Action::make('practice_status')
                ->label('Status')
                ->mountUsing(fn ($form, OfferStudent $record) => $form->fill([
                    'status' => $record->status
                ]))
                ->action(function (OfferStudent $record, array $data) {
                    $record->status = $data['status'];
                    $record->save();
                })
                ->form(fn ($record) => [
                    Select::make('status')
                        ->label($record->student->user->name . '\'s status')
                        ->options([
                            'pending' => 'Pending',
                            'accepted' => 'Accepted',
                            'rejected' => 'Rejected'
                        ])
                        ->required(),
                ]),
            Action::make('view')
                ->action(fn () => true)
                ->modalHeading(fn ($record) => $record->student->user->name . '\'s CV')
                ->modalContent(fn ($record) => view('components.resume-view', ['student' => $record->student]))
                ->modalActions([])
                ->label('View CV')


        ];
    }

    protected function getTableRecordActionUsing(): ?Closure
    {
        return fn (): string => 'view';
    }
    public function render()
    {
        return view('livewire.dashboard.company.applicants')
            ->layout(Dashboard::class, ['title' => 'Applicants']);
    }
}
