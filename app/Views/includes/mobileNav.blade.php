<!-- Mobile menu, show/hide based on menu state. -->
<nav
    x-show="showMobileMenu"
    @click.away="showMobileMenu = false"
    class="lg:hidden bg-white w-screen fixed left-0 top-24 h-auto"
    aria-label="Global"
    id="mobile-menu">
    <div class="pt-2 pb-3 px-2 space-y-1 flex flex-col items-center justify-center">

        <a href="/" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
            Accueil
        </a>

        @foreach ($navElements as $k => $navElement)

            @if (isset($navElement['menu']))
                <div
                    x-data="{ open: false }"
                    @mouseleave="open = false"
                    class="relative">
                    <!-- Dropdown toggle button -->
                    <button
                        @mouseover="open = true"
                        class="text-gray-700 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                        <span class="mr-1">{{ $navElement['menu']['name'] }}</span>
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
                            @click.away="open = false"
                            class="dropdown z-20 absolute left-1/2 transform -translate-x-1/2 w-screen bg-gray-100 rounded-md shadow-xl text-center border border-scuba-dark border-opacity-20">
                        @for ($i = 0; $i <= sizeof($navElement) - 2; $i++)
                            <a href="/{{ $navElement['menu']['slug'] }}/{{ $navElement[$i]->slug }}"
                               class="block px-4 py-2 text-sm text-center text-gray-300 text-gray-700 hover:bg-scuba-green hover:text-white font-medium">
                                {{ $navElement[$i]->name }}
                            </a>
                        @endfor
                    </div>
                </div>
            @else
                <a href="/{{ $navElement['slug'] }}" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                    {{ $navElement['name'] }}
                </a>
            @endif

        @endforeach

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

    </div>
    <div class="border-t border-gray-200 pt-4 pb-3">
        <div class="px-4 flex items-center justify-center mb-4">
            <div class="flex-shrink-0">
                <img
                    class="h-10 w-10 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
            </div>
            <div class="ml-3">
                <div class="text-base font-medium text-scuba-green">Lucas Chaplain</div>
                <div class="text-sm font-medium text-gray-400">contact@lucaschaplain.design</div>
            </div>
        </div>
        <div class="border-t border-b border-gray-200">
            <div class="p-2 w-full flex flex-col items-center justify-center">
                <span class="text-gray-400 italic text-sm">Aucune nouvelle notification</span>
            </div>
        </div>
        <div class="mt-3 px-2 space-y-1">
            <a href="#"
               class="w-full flex items-center justify-center space-x-1.5 px-4 py-2 text-sm text-gray-700 hover:bg-scuba-green hover:text-white font-medium">
                <span>Mon compte</span>
                <i class="fas fa-user-circle text-base inline-flex"></i>
            </a>
            <div class="w-full h-0.5 bg-gray-200"></div>
            <a href="#"
               class="w-full flex items-center justify-center space-x-1.5 px-4 py-2 text-sm text-gray-700 hover:bg-scuba-green hover:text-white font-medium">
                <span>Crédits plongée</span>
                <span class="text-gray-50 h-6 w-6 shadow-md inline-flex items-center justify-center bg-gradient-to-tr from-scuba-light to-blue-500 font-semibold rounded-md p-0.5">12</span>
            </a>
            <div class="w-full h-0.5 bg-gray-200"></div>
            <a href="#"
               class="block px-4 py-2 text-sm text-center text-red-500 font-medium">
                Déconnexion
            </a>
        </div>
    </div>
</nav>