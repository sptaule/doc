<nav class="hidden lg:py-1.5 lg:flex lg:space-x-1" aria-label="Global">

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
                        class="dropdown absolute left-1/2 transform -translate-x-1/2 w-max bg-gray-100 rounded-md shadow-xl text-center border border-scuba-dark border-opacity-20">
                    @for ($i = 0; $i <= sizeof($navElement) - 2; $i++)
                        <a href="/{{ $navElement['menu']['slug'] }}/{{ $navElement[$i]->slug }}"
                           class="block px-4 py-2 text-sm text-gray-300 text-gray-700 hover:bg-scuba-green hover:text-white font-medium">
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