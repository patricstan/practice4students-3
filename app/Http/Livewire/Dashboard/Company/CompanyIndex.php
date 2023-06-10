<?php

namespace App\Http\Livewire\Dashboard\Company;

use App\Models\Offer;
use App\View\Components\Layouts\Dashboard;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CompanyIndex extends Component
{
    public function render()
    {

        $columnChartModel =
            LivewireCharts::ColumnChartModel()
            ->setTitle('Applicants status')
            ->addColumn('Pending', Offer::with('company')
                ->whereHas('company', fn ($q) => $q->where('user_id',  Auth::user()->id))
                ->with('students')
                ->whereHas('students', fn ($q) => $q->where('status', 'pending'))
                ->get()
                ->count(), '#f6ad55')
            ->addColumn('Accepted', Offer::with('company')
                ->whereHas('company', fn ($q) => $q->where('user_id',  Auth::user()->id))
                ->with('students')
                ->whereHas('students', fn ($q) => $q->where('status', 'accepted'))
                ->get()
                ->count(), '#C1E1C1')
            ->addColumn('Rejected', Offer::with('company')
                ->whereHas('company', fn ($q) => $q->where('user_id',  Auth::user()->id))
                ->with('students')
                ->whereHas('students', fn ($q) => $q->where('status', 'rejected'))
                ->get()
                ->count(), '#fc8181');

        return view('livewire.dashboard.company.company-index')
            ->with(['columnChartModel' => $columnChartModel,])
            ->layout(Dashboard::class, ['title' => 'Dashboard']);
    }
}
