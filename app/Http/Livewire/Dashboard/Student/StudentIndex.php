<?php

namespace App\Http\Livewire\Dashboard\Student;

use App\Models\OfferStudent;
use App\View\Components\Layouts\Dashboard;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentIndex extends Component
{
    public function render()
    {
        $columnChartModel =
            LivewireCharts::ColumnChartModel()
            ->setTitle('Number of offers you have applied to.')
            ->addColumn('Pending', OfferStudent::with('offer')->with('student')
                ->where('status', 'pending')
                ->whereHas('student', fn ($q) => $q->where('student_id', Auth::user()->student->id))
                ->get()
                ->count(), '#f6ad55')
            ->addColumn('Accepted', OfferStudent::with('offer')->with('student')
                ->where('status', 'accepted')
                ->whereHas('student', fn ($q) => $q->where('student_id', Auth::user()->student->id))
                ->get()
                ->count(), '#C1E1C1')
            ->addColumn('Rejected', OfferStudent::with('offer')->with('student')
                ->where('status', 'rejected')
                ->whereHas('student', fn ($q) => $q->where('student_id', Auth::user()->student->id))
                ->get()
                ->count(), '#fc8181')

            ->addColumn('Canceled', OfferStudent::with('offer')->with('student')
                ->where('status', 'canceled')
                ->whereHas('student', fn ($q) => $q->where('student_id', Auth::user()->student->id))
                ->get()
                ->count(), '#a9ad55');
        return view('livewire.dashboard.student.student-index')
            ->with(['columnChartModel' => $columnChartModel,])
            ->layout(Dashboard::class, ['title' => 'Dashboard']);
    }
}
