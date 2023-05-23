<x-layouts.guest>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <h2 class="text-4xl font-extrabold dark:text-white pb-8">{{ $title }}</h2>
                {{ $slot }}
            </div>
        </div>
    </section>
</x-layouts.guest>