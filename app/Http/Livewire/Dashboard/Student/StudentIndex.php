<?php

namespace App\Http\Livewire\Dashboard\Student;

use App\View\Components\Layouts\Dashboard;
use Livewire\Component;

class StudentIndex extends Component
{
    public function render()
    {
        return view('livewire.dashboard.student.student-index')
            ->layout(Dashboard::class, ['title' => 'Dashboard']);
    }
}
