<?php

namespace App\Http\Livewire\Guest;

use App\Models\Company;
use LivewireUI\Modal\ModalComponent;

class CompanyModal extends ModalComponent
{
    public Company $company;

    public function viewOffers()
    {
        return redirect()->route('offers_company', ['company_id' => $this->company->id]);
    }

    public function render()
    {
        return view('livewire.guest.company-modal');
    }
}
