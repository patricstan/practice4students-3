<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\View\Components\Layouts\Dashboard;
use Livewire\Component;

class FacultyCompanies extends Component
{
    public function render()
    {
        return view('livewire.dashboard.faculty.faculty-companies')
            ->layout(Dashboard::class, ['title' => 'Companies']);
    }
}
