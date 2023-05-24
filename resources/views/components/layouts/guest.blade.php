<x-layouts.app>

    <!-- Navigation component -->
    <x-guest.nav />



    <!-- Main content  -->
    <div class="max-w-7xl px-4 mx-auto sm:px-6 ">
        <div class="flex flex-col justify-between ">
            <main class="mb-auto">
                {{$slot}}
            </main>
        </div>
    </div>


    <!-- Footer component -->
    <x-guest.footer />

</x-layouts.app>