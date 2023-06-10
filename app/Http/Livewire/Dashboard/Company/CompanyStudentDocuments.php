<?php

namespace App\Http\Livewire\Dashboard\Company;

use App\Models\DocumentStudent;
use App\Models\OfferStudent;
use App\Models\StudentPin;
use App\View\Components\Layouts\Dashboard;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;
use Livewire\Component;

class CompanyStudentDocuments extends Component implements HasTable
{
    use InteractsWithTable;


    protected function getTableQuery(): Builder|Relation
    {
        return OfferStudent::whereIn('offer_id', auth()->user()->company->offers()->pluck('id'))
            ->with('offer')->with('student', fn ($q) => $q->with('user')->with('pin'))->where('status', 'accepted');
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('student.user.name')
                ->label('Student Name')
                ->searchable(),
            TextColumn::make('student.user.email')
                ->label('Student Email')
                ->searchable(),
            TextColumn::make('student.pin.pin')
                ->label('Student Pin'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('documents')
                ->action(function ($record, $data) {
                    $this->emit('openModal', 'document.document-fill', [
                        'doc_id' => DocumentStudent::where('document_id', $data['document_id'])
                            ->where('student_id', $record->student->id)->pluck('id')->first(),
                        'type' => 'STU'
                    ]);
                })
                ->form(fn ($record) => [
                    Select::make('document_id')
                        ->label('Document')
                        ->options(
                            function () use ($record) {
                                $docs = $record->student->documents;
                                return $docs->isNotEmpty()  ? $docs->toQuery()->whereJsonContains('fillable_by', 'COM')
                                    ->get()->pluck('name', 'id') : $docs->pluck('name', 'id');
                            }
                        )
                        ->required(),
                ]),
            Action::make('generate_pin')->label('Generate Pin')
                ->action(function ($record) {
                    StudentPin::updateOrCreate(
                        ['student_id' => $record->student->id],
                        ['pin' => Str::random(8)]
                    );
                })
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.company.company-student-documents')
            ->layout(Dashboard::class, ['title' => 'Student Documents']);
    }
}
