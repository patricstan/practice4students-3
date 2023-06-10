<div>
    <x-slot:button>
        <x-app.primary-button onclick="Livewire.emit('openModal', 'dashboard.company.offers.offer-create')">
            Create Offer
        </x-app.primary-button>
        </x-slot>

        {{$this->table}}
</div>