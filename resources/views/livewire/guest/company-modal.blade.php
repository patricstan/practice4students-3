<x-layouts.modal>
    <img class="p-8 rounded-t-lg" src="{{$company->logo}}" alt="{{$company->company_name}}" />
    <div class="px-5 pb-5">
        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$company->company_name}}</h5>
        <div class="flex items-center mt-2.5 mb-5 text-justify">
            {{$company->about}}
        </div>
        <div class="flex items-center justify-center ">
            <x-app.primary-button wire:click="viewOffers">View Offers</x-app.primary-button>
        </div>
    </div>
</x-layouts.modal>