<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\Models\Company;
use App\Models\Student;
use App\View\Components\Layouts\Dashboard;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class FacultyIndex extends Component
{

    public function render()
    {
        $columnChartModel =
            LivewireCharts::ColumnChartModel()
            ->setTitle('Number of registered users by type')
            ->addColumn('Companies', Company::all()->count(), '#f6ad55')
            ->addColumn('Students', Student::all()->count(), '#fc8181');
        return view('livewire.dashboard.faculty.faculty-index')
            ->with(['columnChartModel' => $columnChartModel,])
            ->layout(Dashboard::class, ['title' => 'Dashboard']);
    }
}
