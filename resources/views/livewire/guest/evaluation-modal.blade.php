<x-layouts.modal>
    <form wire:submit.prevent="submit">

        <div class="px-5 pb-5">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Evaluation Form</h5>

            {{ $this->form }}
            <div class="flex items-center justify-center mt-4 ">
                <x-app.primary-button type="submit">Submit</x-app.primary-button>
            </div>
        </div>
    </form>
</x-layouts.modal>