<?php

namespace App\Http\Livewire\Guest;

use App\Models\Company;
use LivewireUI\Modal\ModalComponent;

class CompanyModal extends ModalComponent
{
    public Company $company;

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function render()
    {
        return view('livewire.guest.company-modal');
    }
}
