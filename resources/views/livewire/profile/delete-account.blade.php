<div class="top-0 left-0 right-0  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full  max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button wire:click="$emit('closeModal')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
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
            </div>
        </div>
    </div>
</div>