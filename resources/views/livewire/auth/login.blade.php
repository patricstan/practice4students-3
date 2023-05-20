<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">

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
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">

        <form wire:submit.prevent='submit'>
            {{$this->form}}
            <x-app.primary-button class="mt-5">
                Submit
            </x-app.primary-button>
    </div>
</div>