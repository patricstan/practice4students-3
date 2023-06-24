<x-layouts.guest>
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-50 dark:bg-gray-900  sm:px-6 lg:px-8">
        <section class="bg-gray-50 dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 ">
                <div class="flex flex-col justify-center">
                    <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-gray-300 leading-9">
                        {{$cta_title}}
                    </h2>
                    @if($cta_alt != '')
                    <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                        Or
                        <a href="{{$alt_link}}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            {{$cta_alt}}
                        </a>
                    </p>
                    @endif
                    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                        <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                            {{$slot}}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</x-layouts.guest>