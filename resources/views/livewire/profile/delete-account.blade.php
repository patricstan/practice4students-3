<x-layouts.modal>

    <form wire:submit.prevent="submit" class="p-6">

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Are you sure you want to delete your account?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
        </p>
        <div class="mt-4">
            {{$this->form}}
            <div class="mt-6 flex justify-end">
                <x-app.secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-app.secondary-button>

                <x-app.danger-button class="ml-3">
                    {{ __('Delete Account') }}
                </x-app.danger-button>
            </div>
        </div>
    </form>
</x-layouts.modal>