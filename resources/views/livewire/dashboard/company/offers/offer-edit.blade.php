<x-layouts.modal>

    <form wire:submit.prevent="update" class="p-6">

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Edit Offer
        </h2>

        <div class="mt-4">
            {{$this->form}}
            <div class="mt-6 flex justify-end space-x-9">
                <x-app.primary-button>
                    Save
                </x-app.primary-button>

                <x-app.danger-button type="button" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-app.danger-button>

            </div>
        </div>
    </form>
</x-layouts.modal>