<div>
    <form wire:submit.prevent='save'>
        {{$this->form}}
        <x-app.primary-button class="mt-4">
            Save
        </x-app.primary-button>
    </form>
</div>