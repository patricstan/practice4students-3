<x-layouts.app>
    <x-dashboard.nav />

    <div class="p-4 sm:ml-64">
        <h2 class="text-4xl font-extrabold dark:text-white pt-12 pb-4">{{$title}}</h2>
        {{$button ?? ''}}
        <div class="p-4 border-2 border-gray-200  rounded-lg dark:border-gray-700">
            {{$slot}}
        </div>
    </div>

</x-layouts.app>