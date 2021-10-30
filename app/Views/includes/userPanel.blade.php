@if(is_connected())

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
                <span class="sr-only">Ouvrir menu utilisateur</span>
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
                   class="inline-block px-4 py-2 text-sm text-gray-700 hover:text-red-500 font-medium">
                    Déconnexion
                </a>
            </div>
        </div>
    </div>

@else

    <div class="flex space-x-4">

        <div class="flex flex-col border border-gray-200 p-2.5 rounded-lg shadow">
            <p class="text-sm">Vous n'avez pas de compte ?</p>
            <div class="flex flex-row items-center space-x-0.5 group w-max">
                <svg class="w-4 h-4 opacity-0 transform duration-300 group-hover:inline-block group-hover:opacity-100 text-scuba-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                <a class="font-semibold inline-block w-max text-scuba-dark border-b-2 transform -translate-x-4 hover:translate-x-0 duration-300 border-transparent hover:border-scuba-dark"
                   href="{{ USER_REGISTER }}">Inscrivez-vous !</a>
            </div>
        </div>

        <div class="flex flex-col border border-gray-200 p-2.5 rounded-lg shadow">
            <p class="text-sm">Vous avez déjà un compte ?</p>
            <div class="flex flex-row items-center space-x-0.5 group w-max">
                <svg class="w-4 h-4 opacity-0 transform duration-300 group-hover:inline-block group-hover:opacity-100 text-scuba-green" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                <a class="font-semibold inline-block w-max text-scuba-green border-b-2 transform -translate-x-4 hover:translate-x-0 duration-300 border-transparent hover:border-scuba-green"
                   href="{{ USER_LOGIN }}">Connectez-vous !</a>
            </div>
        </div>

    </div>

@endif