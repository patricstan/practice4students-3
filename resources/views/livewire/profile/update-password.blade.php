<div>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit.prevent="submit" class="mt-6 space-y-6">
        {{$this->form}}
        <x-app.primary-button class="mt-4">
            Update
        </x-app.primary-button>

    </form>
</div>