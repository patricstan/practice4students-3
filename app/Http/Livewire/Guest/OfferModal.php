<?php

namespace App\Http\Livewire\Guest;

use App\Models\Offer;
use LivewireUI\Modal\ModalComponent;

class OfferModal extends ModalComponent
{
    public Offer $offer;

    public function render()
    {
        return view('livewire.guest.offer-modal');
    }
}
