@php
$classes ='flex items-center pl-2.5'
@endphp


<a href="{{ route('home') }}" {{$attributes->merge(['class' => $classes])}}>
    <svg class="h-6 mr-3 sm:h-7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="344.564 330.278 111.737 91.218" width="53.87" height="43.61">
        <defs>
            <linearGradient id="logo_svg__b" gradientUnits="userSpaceOnUse" x1="420.97" y1="331.28" x2="420.97" y2="418.5">
                <stop style="stop-color:#06b6d4;stop-opacity:1" offset="0%"></stop>
                <stop style="stop-color:#67e8f9;stop-opacity:1" offset="100%"></stop>
            </linearGradient>
            <linearGradient id="logo_svg__d" gradientUnits="userSpaceOnUse" x1="377.89" y1="331.28" x2="377.89" y2="418.5">
                <stop style="stop-color:#06b6d4;stop-opacity:1" offset="0%"></stop>
                <stop style="stop-color:#67e8f9;stop-opacity:1" offset="100%"></stop>
            </linearGradient>
            <path d="M453.3 331.28v28.57l-64.66 58.65v-30.08l64.66-57.14Z" id="logo_svg__a"></path>
            <path d="M410.23 331.28v28.57l-64.67 58.65v-30.08l64.67-57.14Z" id="logo_svg__c"></path>
        </defs>
        <use xlink:href="#logo_svg__a" fill="url(#logo_svg__b)"></use>
        <use xlink:href="#logo_svg__c" fill="url(#logo_svg__d)"></use>
    </svg>
    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Practice4Students</span>
</a>