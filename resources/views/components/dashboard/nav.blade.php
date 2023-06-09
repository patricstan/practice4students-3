<div>


    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-9 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <x-app.logo class="mb-6" />
            <ul class="space-y-2 font-medium">
                <li>
                    <x-dashboard.dropdown />
                </li>
                @php
                $svg = 'heroicon-s-chart-pie'
                @endphp
                @switch(Auth::user()->role)
                @case('student')
                @php
                $links = [
                ['name' => 'Dashboard', 'route' => 'dashboard', 'active' => 'student.dashboard', 'svg' => 'heroicon-s-chart-pie'],
                ['name' => 'Documents', 'route' => 'student.documents', 'active' => 'student.documents', 'svg' => 'heroicon-s-document-text'],
                ['name' => 'Resume', 'route' => 'student.resume', 'active' => 'student.resume', 'svg' => 'heroicon-s-academic-cap'],
                ['name' => 'Internship Status', 'route' => 'student.internship', 'active' => 'student.internship', 'svg' => 'heroicon-s-clipboard-check'],
                ['name' => 'Profile', 'route' => 'profile', 'active' => 'profile', 'svg' => 'heroicon-s-user'],
                ];
                @endphp
                @break
                @case('faculty')
                @php
                $links = [
                ['name' => 'Dashboard', 'route' => 'dashboard', 'active' => 'faculty.dashboard', 'svg' => 'heroicon-s-chart-pie'],
                ['name' => 'Templates', 'route' => 'faculty.templates', 'active' => 'faculty.templates', 'svg' => 'heroicon-s-document-text'],
                ['name' => 'Companies', 'route' => 'faculty.companies', 'active' => 'faculty.companies', 'svg' => 'heroicon-s-office-building'],
                ['name' => 'Students', 'route' => 'faculty.students', 'active' => 'faculty.students', 'svg' => 'heroicon-s-academic-cap'],
                ['name' => 'Profile', 'route' => 'profile', 'active' => 'profile', 'svg' => 'heroicon-s-user'],
                ];
                @endphp
                @break
                @case('company')
                @php
                $links = [
                ['name' => 'Dashboard', 'route' => 'dashboard', 'active' => 'company.dashboard', 'svg' => 'heroicon-s-chart-pie'],
                ['name' => 'Company Information', 'route' => 'company.info', 'active' => 'company.info', 'svg' => 'heroicon-s-office-building'],
                ['name' => 'Offers', 'route' => 'company.offers', 'active' => 'company.offers', 'svg' => 'heroicon-s-archive'],
                ['name' => 'Applicants', 'route' => 'company.applicants', 'active' => 'company.applicants', 'svg' => 'heroicon-s-academic-cap'],
                ['name' => 'Student Documents', 'route' => 'company.documents.student', 'active' => 'company.documents.student', 'svg' => 'heroicon-s-document-text'],
                ['name' => 'Faculty Documents', 'route' => 'company.documents.faculty', 'active' => 'company.documents.faculty', 'svg' => 'heroicon-s-document-report'],
                ['name' => 'Profile', 'route' => 'profile', 'active' => 'profile', 'svg' => 'heroicon-s-user'],
                ];
                @endphp
                @break
                @endswitch
                @foreach($links as $link)
                <li>
                    <x-dashboard.nav-link :href="route($link['route'])" :active="request()->routeIs($link['active'])" :svg="$link['svg']">
                        {{$link['name']}}
                    </x-dashboard.nav-link>
                </li>
                @endforeach
                <li>

                    <x-dashboard.nav-link href="" x-cloak x-on:click="darkMode = !darkMode" svg="heroicon-s-sun">
                        Change Theme
                    </x-dashboard.nav-link>
                </li>
                <li>

                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <button type="submit" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <x-heroicon-s-logout class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" />
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Sign Out</span>
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </aside>

</div>