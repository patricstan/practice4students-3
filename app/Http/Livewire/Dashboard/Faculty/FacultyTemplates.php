<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\View\Components\Layouts\Dashboard;
use Livewire\Component;

class FacultyTemplates extends Component
{
    public function render()
    {
        return view('livewire.dashboard.faculty.faculty-templates')
            ->layout(Dashboard::class, ['title' => 'Templates']);
    }
}
