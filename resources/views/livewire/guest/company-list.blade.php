 <section class="bg-white dark:bg-gray-900">
     <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
         <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
             <h2 class="text-4xl font-extrabold dark:text-white pb-8">{{$title}}</h2>
             <div class="grid grid-cols-2 md:grid-cols-3 gap-4">

                 @if(!$companiesExist)

                 <x-app.not-available-card errorMessage="No companies are available at this time. Please try again later."></x-app.not-available-card>

                 @else

                 <!-- Check if there should be a button to redirect for the page that contains
                 all entries. Used in welcome page-->

                 @if($showMore)

                 @foreach($companies as $company)
                 <livewire:guest.company-card :company="$company" :wire:key="$company->id" />
                 @if(($loop->iteration == $perPage - 1) && (!$loop->last))
                 <div class="grid items-center justify-items-center">
                     <a href="{{route('companies')}}">
                         <x-app.primary-button>
                             View all Partenered Companies
                         </x-app.primary-button>
                     </a>
                 </div>
                 @break

                 @endif
                 @endforeach

                 @else

                 <!-- List all companies using pagination  -->

                 @foreach($companies as $company)


                 <livewire:guest.company-card :company="$company" :wire:key="$company->id" />

                 @endforeach

                 @endif
                 @endif

             </div>
             <!-- Do not show pagination on Welcome page -->
             @if(!$showMore)
             <div class="pt-6">

                 {{$companies->links()}}
             </div>
             @endif
         </div>
     </div>

 </section>