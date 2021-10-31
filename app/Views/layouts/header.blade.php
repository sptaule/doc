<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-200 lg:px-4">
        <div class="relative h-24 flex justify-between">
            <div class="relative z-10 px-2 flex lg:px-0">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/">
                        <img
                        class="block h-20 w-auto"
                        title="Accueil - {{ \App\Models\Club::getValue('club_name') }}"
                        src="https://nausicaa-plongee.com/images/nausicaa/logo-full.svg"
                        alt="Logo - {{ \App\Models\Club::getValue('club_name') }}">
                    </a>
                </div>
            </div>
            <div class="hidden lg:flex relative z-0 flex-1 px-2 items-center justify-center sm:absolute sm:inset-0">
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
            <div class="z-10 flex items-center lg:hidden" x-data="{ showMobileMenu: false }">
                <!-- Mobile menu button -->
                <button
                type="button"
                class="space-x-1 rounded-md p-2 inline-flex items-center justify-center hover:bg-scuba-dark hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                aria-controls="mobile-menu"
                :class="{ 'text-amber-700': showMobileMenu, 'text-scuba-green': !showMobileMenu }"
                @click="showMobileMenu = !showMobileMenu" :aria-expanded="showMobileMenu ? 'true' : 'false'" :class="{ 'active': showMobileMenu }">
                    <span class="text-xs uppercase">menu</span>
                    <!--Icon when menu is closed-->
                    <svg class="w-6 h-6" :class="{ 'hidden': showMobileMenu, 'block': !showMobileMenu }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path></svg>
                    <!--Icon when menu is open-->
                    <svg class="w-6 h-6" :class="{ 'block': showMobileMenu, 'hidden': !showMobileMenu }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                @include('includes.mobileNav')
            </div>
            <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
                @include('includes.notifications')
                @include('includes.userPanel')
            </div>
        </div>

        @include('includes.nav')

    </div>

</header>

<style>
    .dropdown a:first-child:hover {
        border-radius: 5px 5px 0 0;
    }
    .dropdown a:last-child:hover {
        border-radius: 0 0 5px 5px;
    }
</style>