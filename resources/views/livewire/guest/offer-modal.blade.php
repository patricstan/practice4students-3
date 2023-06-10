<x-layouts.modal>
    <div class="text-justify">
        <div class="flex flex-col items-center bg-white md:flex-row md:max-w-xl dark:bg-gray-800 ">
            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{$offer->company->getFirstMediaUrl('company_logos') ? $offer->company->getFirstMediaUrl('company_logos'):$offer->company->logo}}" alt="{{$offer->company->company_name}}">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$offer->title}}</h5>
                <p class="mb-3 text-gray-500 dark:text-gray-400">Posted by <strong class="font-semibold text-gray-900 dark:text-white">{{$offer->company->company_name}}</strong></p>
                <x-guest.offer-props :offer="$offer" class="grid grid-cols-1 lg:grid-cols-2 gap-2 items-center justify-center mb-6 text-gray-900 dark:text-white" />
                <h6 class="text-lg font-bold dark:text-white">Required Skills</h6>
                <x-guest.offer-skills :skills="$offer->skills" />
            </div>
        </div>

        <div class="flex flex-col md:flex-row md:max-w-xl items-center justify-center mb-6 text-gray-900 dark:text-white">
            <p class="text-gray-500 dark:text-gray-400">{{$offer->description}}</p>
        </div>

        @auth
        @if (auth()->user()->role=='student')
        @can('apply-to-offer', $offer)
        <x-app.primary-button wire:click="apply">
            Apply
        </x-app.primary-button>
        @else
        <div class="text-red-500 dark:text-red-400">You have already applied for this offer!</div>
        @endcan
        @endif
        @endauth
    </div>
</x-layouts.modal>