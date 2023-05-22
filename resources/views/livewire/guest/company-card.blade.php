<div wire:click="cardClicked" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div>
        <img class="rounded-t-lg" src="{{$company->logo}}" alt="{{$company->company_name}}" />
    </div>
    <div class="p-5">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">
            {{$company->company_name}}
        </h5>
    </div>
</div>