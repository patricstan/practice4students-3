<x-layouts.guest>

    <!-- Hero section -->

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
                <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-2">Practice4Students</h1>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-6">
                    Unlock your potential with our internship listing application!
                    Discover exciting opportunities, gain hands-on experience, and kickstart your career.
                    Join us today and pave the way for a successful future. Apply now!
                </p>
                <a href="{{route('register')}}">
                    <x-app.primary-button>
                        Register
                    </x-app.primary-button>
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">You're a student / company representative?</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">
                        Regardless if you are a student looking for a new internship or a company representative trying to find new talent, this platform will help fulfill your
                        objective. Just log in and start your journey!
                    </p>
                    <a href="{{route('login')}}">
                        <x-app.primary-button>
                            Login
                        </x-app.primary-button>
                    </a>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                    <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">You're a mentor?</h2>
                    <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">
                        If you're a mentor and are ready to evaluate the students you had to guide, you can do so by followin this link!
                    </p>
                    <a href="{{route('login')}}">
                        <x-app.primary-button>

                            <!-- TODO: fix route -->
                            Evaluation Form
                        </x-app.primary-button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- End Hero section -->

    <!-- Gallery section for 5 partenerd companies  -->
    <!-- If no partenered company exists, then do not render -->
    @if(count($companies))
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">

            <h2 class="text-4xl font-extrabold dark:text-white pb-8">Partenered Companies</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 ">

                @for ($idx = 0; $idx
                < count($companies); $idx +=1) <x-guest.company-card :companyId="$companies[$idx]->id" :companyName="$companies[$idx]->company_name" :companyLogo="$companies[$idx]->logo" />
                @endfor

                @if(count($companies) == 5)
                <div class="grid items-center justify-items-center">
                    <!-- TODO: fix route -->
                    <a href="#">
                        <x-app.primary-button>
                            View all Partenered Companies
                        </x-app.primary-button>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>
    @else
    @endif

    <!-- End Gallery section -->


</x-layouts.guest>