<div class="grid grid-cols-1 items-center bg-white border border-gray-200 rounded-lg shadow md:grid-cols-2 md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto  md:rounded-none md:rounded-l-lg" src="{{$getRecord()->company->getFirstMediaUrl('company_logos') ? $getRecord()->company->getFirstMediaUrl('company_logos'):$getRecord()->company->logo}}" alt="$getRecord()->company->company_name">
    <div class="grid grid-cols-1 justify-between p-4 leading-normal align-middle">
        <h5 class="mb-2 text-md md:text-2xl text-left font-bold tracking-tight text-gray-900 dark:text-white">{{$getRecord()->title}}</h5>

        <x-guest.offer-props class="grid grid-cols-1 text-left md:grid-cols-2 items-center gap-2  mb-6 text-gray-900 dark:text-white" :offer="$getRecord()" />

    </div>
</div>