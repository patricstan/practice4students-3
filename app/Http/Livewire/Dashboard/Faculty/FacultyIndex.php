<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\View\Components\Layouts\Dashboard;
use Livewire\Component;

class FacultyIndex extends Component
{
    public function render()
    {
        return view('livewire.dashboard.faculty.faculty-index')

            ->layout(Dashboard::class, ['title' => 'Dashboard']);
    }
}
