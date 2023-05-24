@props(['active', 'svg'])

@php
$classes = ($active ?? false)
? 'flex items-center w-full p-2 text-blue-700 transition duration-75 rounded-lg group bg-gray-100 dark:text-white dark:bg-gray-700'
: 'flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700';
@endphp

@php
$classes_svg = ($active ?? false)
?'flex-shrink-0 w-6 h-6 text-blue-700 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white'
:'flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>

    <x-dynamic-component :component="$svg" {{$attributes->merge(['class'=>$classes_svg])}} />
    <span class="ml-3">{{$slot}}</span>
    <!-- <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
    </svg>
    <span class="ml-3">Dashboard</span> -->
</a>