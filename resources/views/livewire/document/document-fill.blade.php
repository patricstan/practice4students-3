<x-layouts.modal>

    <form wire:submit.prevent="submit" class="p-6">

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Fill in the Document
        </h2>

        <div class="mt-4">
            {{$this->form}}
            <div class="mt-6 flex justify-end space-x-9">

                <x-app.primary-button class="ml-3">
                    Save
                </x-app.primary-button>

                <x-app.danger-button wire:click="generatePDF" class="ml-3">
                    Generate PDF
                </x-app.danger-button>


                <x-app.secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-app.secondary-button>

            </div>
        </div>
    </form>
</x-layouts.modal>