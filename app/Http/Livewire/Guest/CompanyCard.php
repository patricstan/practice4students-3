<?php

namespace App\Http\Livewire\Guest;

use App\Models\Company;
use Livewire\Component;

class CompanyCard extends Component
{

    public Company $company;

    public function cardClicked()
    {
        $this->emit('openModal', 'guest.company-modal', ['company' => $this->company]);
    }

    public function render()
    {
        return view('livewire.guest.company-card');
    }
}
