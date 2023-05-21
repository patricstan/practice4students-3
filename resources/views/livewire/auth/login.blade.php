<div>
    <form class="mt-8 space-y-6" wire:submit.prevent='submit'>

        {{$this->form}}

        <x-app.primary-button class="mt-5">
            Submit
        </x-app.primary-button>
    </form>

</div>