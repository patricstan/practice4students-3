<div>
    <button type="button" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
        <x-heroicon-s-home class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
        <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>General</span>
        <x-heroicon-s-chevron-down class="w-6 h-6" />
    </button>
    <ul id="dropdown-example" class="hidden py-2 space-y-2">
        @php
        $homeLinks = [
        ['name'=>'Home', 'route'=>'home'],
        ['name'=>'Companies', 'route'=>'companies'],
        ['name'=>'Offers', 'route'=>'offers'],
        ]
        @endphp
        @foreach($homeLinks as $hLink)
        <li>
            <a href="{{route($hLink['route'])}}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                {{$hLink['name']}}
            </a>
        </li>
        @endforeach

    </ul>
</div>