<?php

namespace App\Http\Livewire\Guest;

use App\Models\Offer;
use App\Models\OfferStudent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class OfferModal extends ModalComponent
{
    public Offer $offer;

    public function apply()
    {
        if (!Auth::user()->role == 'student') {
            abort(403);
        }
        if (!Gate::allows('apply-to-offer', $this->offer)) {
            abort(403);
        }
        $this->offer->students()->attach(Auth::user()->student->first()->id, ['status' => 'pending']);
        // OfferStudent::create([
        //     'offer_id' => $this->offer->id,
        //     'student_id' => Auth::user()->student->first()->id,
        //     'status' => 'pending',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ]);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.guest.offer-modal');
    }
}
