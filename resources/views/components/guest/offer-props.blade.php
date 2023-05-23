<ul {{$attributes}}>
    <li class="ml-1 mr-1">
        <div data-tooltip-target="tl-start-date" class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400">
            <svg class="h-4 w-4 mr-1" fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <title>calendar</title>
                    <path d="M0 26.016q0 2.496 1.76 4.224t4.256 1.76h20q2.464 0 4.224-1.76t1.76-4.224v-20q0-1.952-1.12-3.488t-2.88-2.144v2.624q0 1.248-0.864 2.144t-2.144 0.864-2.112-0.864-0.864-2.144v-3.008h-12v3.008q0 1.248-0.896 2.144t-2.112 0.864-2.144-0.864-0.864-2.144v-2.624q-1.76 0.64-2.88 2.144t-1.12 3.488v20zM4 26.016v-16h24v16q0 0.832-0.576 1.408t-1.408 0.576h-20q-0.832 0-1.44-0.576t-0.576-1.408zM6.016 3.008q0 0.416 0.288 0.704t0.704 0.288 0.704-0.288 0.288-0.704v-3.008h-1.984v3.008zM8 24h4v-4h-4v4zM8 18.016h4v-4h-4v4zM14.016 24h4v-4h-4v4zM14.016 18.016h4v-4h-4v4zM20 24h4v-4h-4v4zM20 18.016h4v-4h-4v4zM24 3.008q0 0.416 0.288 0.704t0.704 0.288 0.704-0.288 0.32-0.704v-3.008h-2.016v3.008z"></path>
                </g>
            </svg> {{$offer->start_date}}
        </div>
        <div id="tl-start-date" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Start Date
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

    </li>

    @if($offer->is_paid)
    <li class="ml-1 mr-1">
        <div data-tooltip-target="tl-salary" class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400">
            <svg class="h-4 w-4 mr-1" viewBox="0 -1 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <title>money_round [#1184]</title>
                    <desc>Created with Sketch.</desc>
                    <defs> </defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Dribbble-Light-Preview" transform="translate(-260.000000, -2920.000000)" fill="#000000">
                            <g id="icons" transform="translate(56.000000, 160.000000)">
                                <path d="M206,2763 L206,2762 C206,2760.895 206.895,2760 208,2760 L220,2760 C221.105,2760 222,2760.895 222,2762 L222,2763 C222,2763.552 221.552,2764 221,2764 C220.448,2764 220,2763.552 220,2763 C220,2762.448 219.552,2762 219,2762 L209,2762 C208.448,2762 208,2762.448 208,2763 C208,2763.552 207.552,2764 207,2764 C206.448,2764 206,2763.552 206,2763 L206,2763 Z M216,2772 C216,2773.105 215.105,2774 214,2774 C212.895,2774 212,2773.105 212,2772 C212,2770.895 212.895,2770 214,2770 C215.105,2770 216,2770.895 216,2772 L216,2772 Z M222,2769.657 L220.343,2768 C221.972,2768 222,2768.384 222,2769.657 L222,2769.657 Z M220.343,2776 L222,2774.343 C222,2775.97 221.62,2776 220.343,2776 L220.343,2776 Z M210.485,2776 L206.485,2772 L210.485,2768 L217.515,2768 L221.515,2772 L217.515,2776 L210.485,2776 Z M206,2774.343 L207.657,2776 C206.03,2776 206,2775.62 206,2774.343 L206,2774.343 Z M207.657,2768 L206,2769.657 C206,2768.028 206.384,2768 207.657,2768 L207.657,2768 Z M222,2766 L206,2766 C204.895,2766 204,2766.895 204,2768 L204,2776 C204,2777.105 204.895,2778 206,2778 L222,2778 C223.105,2778 224,2777.105 224,2776 L224,2768 C224,2766.895 223.105,2766 222,2766 L222,2766 Z" id="money_round-[#1184]"> </path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg> {{$offer->salary . ' ' . $offer->currency}}
        </div>
        <div id="tl-salary" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Salary
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

    </li>

    @endif
    <li class="ml-1 mr-1">
        <div data-tooltip-target="tl-work-location" class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400">
            <svg class="h-4 w-4 mr-1" fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M22,7H17V2a1,1,0,0,0-1-1H8A1,1,0,0,0,7,2V7H2A1,1,0,0,0,1,8V22a1,1,0,0,0,1,1H22a1,1,0,0,0,1-1V8A1,1,0,0,0,22,7ZM3,9H7V21H3ZM9,8V3h6V21H13V19a1,1,0,0,0-2,0v2H9ZM21,21H17V9h4ZM13,7H11V5h2Zm0,4H11V9h2Zm0,4H11V13h2ZM4,10H6v2H4Zm0,4H6v2H4Zm0,4H6v2H4Zm16-6H18V10h2Zm0,4H18V14h2Zm0,4H18V18h2Z"></path>
                </g>
            </svg>
            {{ $offer->work_location}}
        </div>
        <div id="tl-work-location" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Work Location
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </li>

    @if($offer->work_location !== 'remote')
    <li class="ml-1 mr-1">
        <div data-tooltip-target="tl-city" class="inline-flex items-center text-sm font-medium text-gray-700 dark:text-gray-400">
            <svg class="h-4 w-4 mr-1" fill="#000000" viewBox="-3 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="m8.075 23.52c-6.811-9.878-8.075-10.891-8.075-14.52 0-4.971 4.029-9 9-9s9 4.029 9 9c0 3.629-1.264 4.64-8.075 14.516-.206.294-.543.484-.925.484s-.719-.19-.922-.48l-.002-.004zm.925-10.77c2.07 0 3.749-1.679 3.749-3.75s-1.679-3.75-3.75-3.75-3.75 1.679-3.75 3.75c0 2.071 1.679 3.75 3.75 3.75z"></path>
                </g>
            </svg>
            {{ $offer->city }}
        </div>
        <div id="tl-city" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            City
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </li>
    @endif
</ul>