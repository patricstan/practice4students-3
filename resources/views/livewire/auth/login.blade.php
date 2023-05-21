<div>

    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 ">
            <div class="flex flex-col justify-center">
                <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 leading-9">
                    Sign in to your account
                </h2>
                @if (Route::has('register'))
                <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                    Or
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        create a new account
                    </a>
                </p>
                @endif
                <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                    <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                        <form class="mt-8 space-y-6" wire:submit.prevent='submit'>
                            {{$this->form}}
                            <x-app.primary-button class="mt-5">
                                Submit
                            </x-app.primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>