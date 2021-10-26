<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-4">
        <div class="relative h-24 flex justify-between">
            <div class="relative z-10 px-2 flex lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img
                        class="block h-20 w-auto transform hover:scale-95 duration-100"
                        title="Accueil - {{ \App\Models\Club::getValue('club_name') }}"
                        src="https://nausicaa-plongee.com/images/nausicaa/logo-full.svg"
                        alt="Logo - {{ \App\Models\Club::getValue('club_name') }}">
                    </a>
                </div>
            </div>
            <div class="relative z-0 flex-1 px-2 flex items-center justify-center sm:absolute sm:inset-0">
                <div class="w-full sm:max-w-xs">
                    <label
                    for="search"
                    class="sr-only">
                        Recherche
                    </label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                            <!-- Heroicon name: solid/search -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input id="search" name="search" class="block w-full bg-gray-100 border border-transparent rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:bg-gray-200 focus:ring-scuba-dark focus:text-gray-900 focus:shadow focus:placeholder-gray-500 sm:text-sm" placeholder="Recherche" type="search">
                    </div>
                </div>
            </div>
            <div class="relative z-10 flex items-center lg:hidden">
                <!-- Mobile menu button -->
                <button
                type="button"
                class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                aria-controls="mobile-menu"
                aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!--
                      Icon when menu is closed.

                      Heroicon name: outline/menu

                      Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!--
                      Icon when menu is open.

                      Heroicon name: outline/x

                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                <div x-data="{ open: false }">
                    <button
                    x-on:click="open = ! open"
                    type="button"
                    class="bg-gray-100 flex-shrink-0 rounded-full p-1 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div
                    x-show="open"
                    x-transition
                    class="dropdown absolute right-0 mt-2 w-96 bg-gray-100 rounded-md shadow-xl text-center border border-scuba-dark border-opacity-20">
                        <div class="p-2 w-full flex flex-col items-start">
                            <span class="text-gray-600 italic text-sm">Notifications</span>
                            <div class="h-0.5 w-full bg-gray-200 my-1.5"></div>
                            <span class="text-gray-400 italic text-sm">Aucune nouvelle notification</span>
                        </div>
                    </div>
                </div>

                <!-- Profile dropdown -->
                <div class="flex-shrink-0 relative ml-2">
                    <div
                    x-data="{ open: false }"
                    @mouseleave="open = false">
                        <button
                        @mouseover="open = true"
                        type="button"
                        class="text-gray-700 rounded-full flex items-center justify-center text-sm text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        id="user-menu-button"
                        aria-expanded="false"
                        aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img
                            class="px-0 mx-0 h-8 w-8 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Avatar">
                            <span class="px-1.5">Lucas</span>
                        </button>
                        <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        class="dropdown absolute left-1/2 transform -translate-x-1/2 w-max bg-gray-100 rounded-md shadow-xl text-center border border-scuba-dark border-opacity-20">
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-scuba-green hover:text-white font-medium">
                                Mon compte
                            </a>
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white font-medium">
                                Déconnexion
                            </a>
                        </div>
                    </div>

                    <!--
                      Dropdown menu, show/hide based on menu state.

                      Entering: "transition ease-out duration-100"
                        From: "transform opacity-0 scale-95"
                        To: "transform opacity-100 scale-100"
                      Leaving: "transition ease-in duration-75"
                        From: "transform opacity-100 scale-100"
                        To: "transform opacity-0 scale-95"
                    -->


                </div>
            </div>
        </div>

        <nav class="hidden lg:py-1.5 lg:flex lg:space-x-2.5" aria-label="Global">

            <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                Accueil
            </a>

            @foreach(\App\Models\Navigation::getMenus() as $menu)
                <div
                        x-data="{ open: false }"
                        @mouseleave="open = false"
                        class="relative">
                    <!-- Dropdown toggle button -->
                    <button
                            @mouseover="open = true"
                            class="text-gray-700 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                        <span class="mr-1">Club</span>
                        <svg class="w-4 h-4 text-white text-gray-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 transform scale-90"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform scale-100"
                            x-transition:leave-end="opacity-0 transform scale-90"
                            class="dropdown absolute left-1/2 transform -translate-x-1/2 w-max bg-gray-100 rounded-md shadow-xl text-center border border-scuba-dark border-opacity-20">
                        @foreach(\App\Models\Navigation::getPages("m.id = $menu->id") as $childPage)
                            <a href="/{{ $menu->slug }}/{{ $childPage->slug }}"
                               class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-scuba-green hover:text-white font-medium">
                                {{ $childPage->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            @foreach(\App\Models\Navigation::getPages() as $page)
                @if(is_null($page->menu_id))
                    <a href="/{{ $page->slug }}" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                        {{ $page->name }}
                    </a>
                @endif
            @endforeach

            <div class="hidden lg:inline-block h-auto w-0.5 bg-gray-100"></div>

            <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                Formations
            </a>

            <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                Sites de plongée
            </a>

            <div class="hidden lg:inline-block h-auto w-0.5 bg-gray-100"></div>

            <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                Évènements
            </a>

            <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                Membres
            </a>

        </nav>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <nav
    class="lg:hidden"
    aria-label="Global"
    id="mobile-menu">
        <div class="pt-2 pb-3 px-2 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="bg-gray-900 text-white block rounded-md py-2 px-3 text-base font-medium" aria-current="page">Dashboard</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Team</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Projects</a>

            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium">Calendar</a>
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
            <div class="px-4 flex items-center">
                <div class="flex-shrink-0">
                    <img
                    class="h-10 w-10 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-white">Tom Cook</div>
                    <div class="text-sm font-medium text-gray-400">tom@example.com</div>
                </div>
                <button type="button" class="ml-auto flex-shrink-0 bg-gray-800 rounded-full p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <!-- Heroicon name: outline/bell -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>
            </div>
            <div class="mt-3 px-2 space-y-1">
                <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>

                <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>

                <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
            </div>
        </div>
    </nav>
</header>

<style>
    .dropdown a:first-child:hover {
        border-radius: 5px 5px 0 0;
    }
    .dropdown a:last-child:hover {
        border-radius: 0 0 5px 5px;
    }
</style>