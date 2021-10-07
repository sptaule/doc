@php
    if (maintenance_status() === true) {
        flash_danger("Le site est actuellement en maintenance<br>Tu as été redirigé ici en attendant <span class='text-2xl'>😇</span>");
        redirect(PUBLIC_MAINTENANCE);
    }
    $query = pdo()->prepare("SELECT * FROM categories ORDER BY id");
    $query->execute();
    $categories = $query->fetchAll();
    $query = pdo()->prepare("SELECT * FROM global_options WHERE name = ?");
    $query->execute(['permanent_blob']);
    $permanentBlob = $query->fetch();
@endphp

<style>
    .custom-shape-divider-bottom-1630246037{width:100%;overflow:hidden;line-height:0}.custom-shape-divider-bottom-1630246037 svg{position:relative;display:block;width:calc(100% + 1.3px);height:10px}.custom-shape-divider-bottom-1630246037 .shape-fill{fill:#e4761c}
</style>

@if($permanentBlob->status == 1 && !empty($permanentBlob->content))
    <div id="top-blob" class="w-full flex flex-row items-center space-x-12 bg-aup-black text-aup-white text-shadow-white px-4 lg:px-24 py-4">
        <div class="flex flex-row space-x-12 items-center w-full lg:max-w-6xl mx-auto">
            <img class="hidden lg:flex" src="https://cdn-icons-png.flaticon.com/64/2375/2375555.png" alt="">
            <div>
                {!! $permanentBlob->content !!}
            </div>
        </div>
    </div>
@endif

<div id="top-logo" class="h-64 flex items-center bg-aup-orange justify-center">
    <div class="flex items-center justify-center w-48 h-48 bg-aup-white bg-opacity-75 transform transition hover:shadow-2xl rounded-full transform hover:scale-90">
        <a href="{{ PUBLIC_HOME }}"
           class="w-full py-1 px-2 flex items-center justify-center space-x-1.5 h-20 text-sm 2xl:text-base transform transition hover:scale-95">
            <img src="/images/logo-aup-black.svg" alt="" class="w-48 h-48">
        </a>
    </div>
</div>

<div id="navigation" class="h-auto hidden lg:flex items-center justify-center font-classic bg-aup-orange">
    <ul class="px-1 xl:px-3 box-content group w-full mx-auto flex flex-row justify-center space-x-2 items-center text-aup-white font-bold">

        <li id="navigation-logo"
            class="hidden transition ease-in-out flex items-center justify-center duration-700 mr-8 hover:shadow-lg hover:bg-aup-white hover:bg-opacity-75 rounded-full transform hover:scale-90">
            <a href="{{ PUBLIC_HOME }}"
               class="w-full py-1 px-2 flex items-center justify-center space-x-1.5 h-20 text-sm 2xl:text-base hover:text-shadow-white transform transition hover:scale-95">
                <img src="/images/logo-aup-black-simple.svg" alt="" class="w-16 h-16">
            </a>
        </li>

        <li class="transition ease-in-out flex items-center justify-center duration-700">
            <div x-data="{open: false}" @mouseover="open = true" @mouseleave="open = false">
                <div class="relative flex items-center space-x-1 cursor-pointer">
                    <a href="{{ PUBLIC_SHOP }}"
                       class="w-full py-1 px-2 flex items-center justify-center space-x-1.5 h-20 text-sm 2xl:text-base hover:text-shadow-white">
                        <img src="https://image.flaticon.com/icons/png/32/4624/4624313.png" alt="" class="w-5 h-5">
                        <span>Boutique</span>
                    </a>
                    <div
                            class="w-max min-w-full origin-center absolute top-16 left-1/2 transform -translate-x-1/2 rounded-md shadow-lg transition-all duration-200 ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                            x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95">
                        <div class="py-1 w-full bg-white overflow-hidden rounded-md group normal-case font-semibold tracking-wide text-aup-black submenu"
                             style="z-index:9999 !important;">
                            @foreach($categories as $category)
                                <a href="/shop/?cat={{ $category->slug }}"
                                   class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                                    <img src="{{ $category->icon }}" class="w-6 h-6" alt="{{ $category->slug }}">
                                    <span>{{ $category->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </li>

        <li class="transition ease-in-out flex items-center justify-center duration-700">
            <a href="{{ PUBLIC_JOURNAL }}"
               class="w-full py-1 px-2 flex items-center justify-center space-x-1.5 h-20 text-sm 2xl:text-base hover:text-shadow-white">
                <img src="https://image.flaticon.com/icons/png/32/3127/3127361.png" alt="" class="w-5 h-5">
                <span>Journal des Piafeurs</span>
            </a>
        </li>

        <li class="transition ease-in-out flex items-center justify-center duration-700">
            <div class="" x-data="{open: false}" @mouseover="open = true" @mouseleave="open = false">
                <div class="relative flex items-center space-x-1 cursor-pointer">
                    <a href="#!"
                       class="w-full py-1 px-2 flex items-center justify-center space-x-1.5 h-20 text-sm 2xl:text-base hover:text-shadow-white">
                        <img src="https://image.flaticon.com/icons/png/32/391/391038.png" alt="" class="w-5 h-5">
                        <span>C'est quoi ?</span>
                    </a>
                    <div
                            class="w-max min-w-full origin-center absolute top-16 left-1/2 transform -translate-x-1/2 rounded-md shadow-lg transition-all duration-200 ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                            x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95">
                        <div class="py-1 w-full bg-white overflow-hidden rounded-md group normal-case font-semibold tracking-wide text-aup-black submenu"
                             style="z-index:9999 !important;">
                            <a href="{{ PUBLIC_CLINIQUE }}"
                               class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                                <img src="https://image.flaticon.com/icons/png/32/2309/2309962.png" class="w-6 h-6"
                                     alt="">
                                <span>La clinique du Piaf</span>
                            </a>
                            <a href="{{ PUBLIC_NURSERIE }}"
                               class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                                <img src="https://image.flaticon.com/icons/png/32/3741/3741131.png" class="w-6 h-6"
                                     alt="">
                                <span>La nurserie</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>

        <li class="transition ease-in-out flex items-center justify-center duration-700">
            <a href="{{ PUBLIC_CONTACT }}"
               class="w-full py-1 px-2 flex items-center justify-center space-x-1.5 h-20 text-sm 2xl:text-base hover:text-shadow-white">
                <img src="https://image.flaticon.com/icons/png/32/190/190432.png" alt="" class="w-5 h-5">
                <span>Contact</span>
            </a>
        </li>

        @if(!is_connected())
        <li class="transition ease-in-out flex items-center justify-center duration-700">
            <div class="" x-data="{open: false}" @mouseover="open = true" @mouseleave="open = false">
                <div class="relative flex items-center space-x-1 cursor-pointer">
                    <a href="#!"
                       class="w-full py-1 px-2 flex items-center justify-center space-x-1.5 h-20 text-sm 2xl:text-base hover:text-shadow-white">
                        <img src="https://image.flaticon.com/icons/png/32/1177/1177568.png" alt="" class="w-5 h-5">
                        <span>Espace membre</span>
                    </a>
                    <div
                            class="w-max min-w-full origin-center absolute top-16 left-1/2 transform -translate-x-1/2 rounded-md shadow-lg transition-all duration-200 ring-1 ring-black ring-opacity-5 focus:outline-none z-50"
                            x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95">
                        <div class="py-1 w-full bg-white overflow-hidden rounded-md group normal-case font-semibold tracking-wide text-aup-black submenu"
                             style="z-index:9999 !important;">
                            <a href="{{ USER_LOGIN }}"
                               class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                                <img src="https://cdn-icons-png.flaticon.com/32/1828/1828466.png" class="w-5 h-5"
                                     alt="">
                                <span>Connexion</span>
                            </a>
                            <a href="{{ USER_REGISTER }}"
                               class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                                <img src="https://cdn-icons-png.flaticon.com/32/2921/2921222.png" class="w-5 h-5"
                                     alt="">
                                <span>Inscription</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        @else
            <li class="transition ease-in-out flex items-center justify-center duration-700">
                <a href="{{ USER_DASHBOARD }}"
                   class="w-full py-1 px-2 flex items-center justify-center space-x-1.5 h-20 text-sm 2xl:text-base hover:text-shadow-white">
                    <img src="https://image.flaticon.com/icons/png/32/1177/1177568.png" alt="" class="w-5 h-5">
                    <span>Mon compte</span>
                </a>
            </li>
        @endif
    </ul>
</div>

<div id="nav-decoration" class="hidden lg:block custom-shape-divider-bottom-1630246037">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
              class="shape-fill"></path>
    </svg>
</div>

<div class="block lg:hidden w-full text-gray-50">
    <div x-data="{ open: false }"
         class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-around md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-around">
            <a href="{{ PUBLIC_HOME }}"
               class="text-xl font-semibold tracking-widest text-gray-50 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">AdopteUnPiaf</a>
            <button class="flex flex-row items-center space-x-2 ml-8 text-white rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <span class="text-shadow-white" style="font-variant:small-caps">menu</span>
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd"
                          d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                          clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'flex': open, 'hidden': !open}"
             class="pb-4 md:pb-0 hidden lg:flex pt-3 flex-col items-center justify-center font-classic">

            <a href="{{ PUBLIC_HOME }}"
               class="flex items-center justify-center space-x-1.5 px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <img src="https://cdn-icons-png.flaticon.com/32/2817/2817871.png" alt="" class="w-5 h-5">
                <span>Accueil</span>
            </a>

            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <img src="https://image.flaticon.com/icons/png/32/4624/4624313.png" alt="" class="w-5 h-5 mr-1.5">
                    <a href="{{ PUBLIC_SHOP }}">Boutique</a>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                         class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                     style="z-index: 9999 !important;" x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="py-1 w-full bg-white overflow-hidden rounded-md group normal-case font-semibold tracking-wide text-aup-black submenu"
                         style="z-index:9999 !important;width: max-content">
                        @foreach($categories as $category)
                            <a href="/shop/?cat={{ $category->slug }}"
                               class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                                <img src="{{ $category->icon }}" class="w-6 h-6" alt="{{ $category->slug }}">
                                <span>{{ $category->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <a href="{{ PUBLIC_JOURNAL }}"
               class="flex items-center justify-center space-x-1.5 px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <img src="https://image.flaticon.com/icons/png/32/3127/3127361.png" alt="" class="w-5 h-5">
                <span>Journal des Piafeurs</span>
            </a>

            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <img src="https://image.flaticon.com/icons/png/32/391/391038.png" alt="" class="w-5 h-5 mr-1.5">
                    <a href="#!">C'est quoi ?</a>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                         class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                     style="z-index: 9999 !important" x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="w-max px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800"
                         style="z-index: 9999 !important">
                        <a href="{{ PUBLIC_CLINIQUE }}"
                           class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                            <img src="https://image.flaticon.com/icons/png/32/2309/2309962.png" class="w-6 h-6"
                                 alt="">
                            <span class="text-aup-black font-semibold">La clinique</span>
                        </a>
                        <a href="{{ PUBLIC_NURSERIE }}"
                           class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                            <img src="https://image.flaticon.com/icons/png/32/3741/3741131.png" class="w-6 h-6"
                                 alt="">
                            <span class="text-aup-black font-semibold">La nurserie</span>
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ PUBLIC_CONTACT }}"
               class="flex items-center justify-center space-x-1.5 px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <img src="https://image.flaticon.com/icons/png/32/190/190432.png" alt="" class="w-5 h-5">
                <span>Contact</span>
            </a>

            @if(!is_connected())
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                        class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <a href="#!">Espace membre</a>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                         class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                     style="z-index: 9999 !important" x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="bg-white absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="w-max px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800"
                         style="z-index: 9999 !important">
                        <a href="{{ USER_LOGIN }}"
                           class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                            <img src="https://cdn-icons-png.flaticon.com/32/1828/1828466.png" class="w-5 h-5"
                                 alt="">
                            <span>Connexion</span>
                        </a>
                        <a href="{{ USER_REGISTER }}"
                           class="flex items-center space-x-1.5 px-4 py-2 text-sm w-full bg-white hover:bg-aup-orange rounded-lg hover:bg-opacity-20 transform hover:translate-x-1 transition-all duration-300">
                            <img src="https://cdn-icons-png.flaticon.com/32/2921/2921222.png" class="w-5 h-5"
                                 alt="">
                            <span>Inscription</span>
                        </a>
                    </div>
                </div>
            </div>
            @else
                <a href="{{ USER_DASHBOARD }}"
                   class="flex items-center justify-center space-x-1.5 px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <img src="https://image.flaticon.com/icons/png/32/1177/1177568.png" alt="" class="w-5 h-5">
                    <span>Mon compte</span>
                </a>
            @endif

        </nav>
    </div>
</div>

<script>
    $.fn.animateTransform = function () {
        for (var a = null, b = null, c = 400, d = function () {
        }, e = 0; e < arguments.length; e++) "string" == typeof arguments[e] ? a ? b = arguments[e] : a = arguments[e] : "number" == typeof arguments[e] ? c = arguments[e] : "function" == typeof arguments[e] && (d = arguments[e]);
        if (a && !b && (b = a, a = null), b) {
            a && this.css("transform", a), c < 16 && (c = 16);
            var f = this.css("transition");
            this.css("transition", "transform " + c + "ms"), this.css("transform", b);
            var g = this;
            setTimeout(function () {
                g.css("transition", f || ""), g.css("transform", b), d()
            }, c)
        }
    }
    let header = $('header');
    let topLogo = $('#top-logo');
    let topBlob = $('#top-blob');
    let navigation = $('#navigation');
    let navigationLogo = $('#navigation-logo');
    let navigationDecoration = $('#nav-decoration');
    let topLogoHeight = $(topLogo).height();
    let topBlobHeight = $(topBlob).height() ?? 0;

    @if(!is_on_page(USER_DASHBOARD) && !is_on_page(USER_EDIT))

        $(window).on('scroll', function () {
            let scroll = $(window).scrollTop();
            if (scroll >= 1) {
                $(header).animateTransform(`translateY(-${topLogoHeight + topBlobHeight + 25}px)`, 500);
                $(navigationLogo).removeClass("hidden");
                $(navigation).addClass("shadow-xl");
            } else if (scroll <= 250) {
                $(header).animateTransform(`translateY(0)`, 750);
                $(navigationLogo).addClass("hidden");
            }
        });

    @else

        $(topLogo).addClass('hidden')

    @endif

</script>