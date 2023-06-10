<div>
    <x-slot:button>
        <x-app.primary-button onclick="Livewire.emit('openModal', 'document.document-add', {{json_encode(['type'=>'STU'])}})">Add Document</x-app.primary-button>
        </x-slot>
        {{$this->table}}
</div>