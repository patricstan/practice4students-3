<?php

namespace App\Http\Livewire\Dashboard\Student;

use App\Models\OfferStudent;
use App\View\Components\Layouts\Dashboard;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Livewire\Component;

class StudentInternshipStatus extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder|Relation
    {
        return OfferStudent::query()->with('offer.company')->where('student_id', auth()->user()->student->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('offer.title')
                ->label('Title')
                ->sortable()
                ->searchable(),
            TextColumn::make('offer.company.company_name')
                ->searchable(),
            TextColumn::make('status')
                ->sortable()

        ];
    }

    public function isTableSearchable(): bool
    {
        return true;
    }

    public function render()
    {
        return view('livewire.dashboard.student.student-internship-status')
            ->layout(Dashboard::class, ['title' => 'Internship Status']);
    }
}
