<x-layouts.dashboard>
    <x-slot:title>
        Profile
        </x-slot>
        <div class="py-12">
            <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        <!-- update info -->
                        <livewire:profile.update-information :user="$user" />
                    </div>
                </div>

                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        <!-- update pass -->
                        <livewire:profile.update-password :user="$user" />
                    </div>
                </div>

                <div class="p-4 bg-white shadow sm:p-8 dark:bg-gray-800 sm:rounded-lg">
                    <div class="max-w-xl">
                        <!-- delete acc -->
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Delete Account') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                            </p>
                        </header>
                        <x-app.danger-button onclick="Livewire.emit('openModal', 'profile.delete-account', {{json_encode(['user'=>$user])}} )" class="mt-4">
                            Delete Account
                        </x-app.danger-button>

                    </div>
                </div>
            </div>
        </div>

</x-layouts.dashboard>