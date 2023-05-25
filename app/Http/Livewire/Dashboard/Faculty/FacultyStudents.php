<?php

namespace App\Http\Livewire\Dashboard\Faculty;

use App\View\Components\Layouts\Dashboard;
use Livewire\Component;

class FacultyStudents extends Component
{
    public function render()
    {
        return view('livewire.dashboard.faculty.faculty-students')
            ->layout(Dashboard::class, ['title' => 'Students']);
    }
}
