<div class="h-auto flex rounded" x-data="{ showHelp: true }">

    <!-- Narrow sidebar -->
    <div class="hidden w-32 bg-scuba-dark overflow-y-auto md:block">
        <div class="w-full py-2 flex flex-col items-center">
            <div class="flex-1 w-full px-2 space-y-1">

                <a
                href="{{ USER_DASHBOARD }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-scuba-light
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD ? 'bg-blue-800 shadow-inner text-scuba-light' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg class="text-blue-200 group-hover:text-blue-100 h-6 w-6" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>

                <a
                href="{{ USER_DASHBOARD_PROFILE }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-scuba-light
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_PROFILE ? 'bg-blue-800 shadow-inner text-scuba-light' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-scuba-light h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_PROFILE ? 'text-scuba-light' : 'text-blue-200' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="mt-1 text-sm">Profil</span>
                </a>

                <a
                href="{{ USER_DASHBOARD_LICENCE }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-orange-400
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_LICENCE ? 'bg-blue-800 shadow-inner text-orange-400' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-orange-400 h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_LICENCE ? 'text-orange-400' : 'text-blue-200' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <span class="mt-1 text-sm">Licence</span>
                </a>

                <a
                href="{{ USER_DASHBOARD_CERTIFICATE }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-green-400
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_CERTIFICATE ? 'bg-blue-800 shadow-inner text-green-400' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-green-400 h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_CERTIFICATE ? 'text-green-400' : 'text-blue-200' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="mt-1 text-sm">Certificat</span>
                </a>

                <a
                href="{{ USER_DASHBOARD_MEMBERSHIP }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-red-500
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_MEMBERSHIP ? 'bg-blue-800 shadow-inner text-red-500' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-red-500 h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_MEMBERSHIP ? 'text-red-500' : 'text-blue-200' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <span class="mt-1 text-sm">Adhésion</span>
                </a>

                <a
                href="{{ USER_DASHBOARD_ORDERS }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-yellow-300
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_ORDERS ? 'bg-blue-800 shadow-inner text-yellow-300' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-yellow-300 h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_ORDERS ? 'text-yellow-300' : 'text-blue-200' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M14.121 15.536c-1.171 1.952-3.07 1.952-4.242 0-1.172-1.953-1.172-5.119 0-7.072 1.171-1.952 3.07-1.952 4.242 0M8 10.5h4m-4 3h4m9-1.5a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="mt-1 text-sm">Achats</span>
                </a>

                <a
                href="{{ USER_DASHBOARD_BUBBLE }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-pink-400
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_BUBBLE ? 'bg-blue-800 shadow-inner text-pink-400' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-pink-400 h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_BUBBLE ? 'text-pink-400' : 'text-blue-200' }}"
                    viewBox="0 0 6.35 6.35"
                    xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" stroke="currentColor" stroke-width="0.5" transform="rotate(-80.053)"
                              d="m-0.0032201 3.1816a0.56899 0.56899 0 0 1-0.56899 0.56899 0.56899 0.56899 0 0 1-0.56899-0.56899 0.56899 0.56899 0 0 1 0.56899-0.56899 0.56899 0.56899 0 0 1 0.56899 0.56899zm-0.64221 1.653a0.79729 0.79729 0 0 1-0.79729 0.79729 0.79729 0.79729 0 0 1-0.79729-0.79729 0.79729 0.79729 0 0 1 0.79729-0.79729 0.79729 0.79729 0 0 1 0.79729 0.79729zm-2.1053-1.884s0.058238 0.41898-0.35904 0.79c-0.23707 0.21079-0.54368 0.23576-0.54368 0.23576m0.10902 0.65684a1.7075 1.7075 0 0 1-1.9768-1.3869 1.7075 1.7075 0 0 1 1.3869-1.9768 1.7075 1.7075 0 0 1 1.9768 1.3869 1.7075 1.7075 0 0 1-1.3869 1.9768z"/>
                    </svg>
                    <span class="mt-1 text-sm">Bulle</span>
                </a>

                <a
                href="{{ USER_DASHBOARD_INBOX }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-orange-500
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_INBOX ? 'bg-blue-800 shadow-inner text-orange-400' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-orange-500 h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_INBOX ? 'text-oarange-500' : 'text-blue-200' }}"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                    <span class="mt-1 text-sm">Messagerie</span>
                </a>

                <a
                href="{{ USER_DASHBOARD_ALBUMS }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-purple-500
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_ALBUMS ? 'bg-blue-800 shadow-inner text-purple-500' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-purple-500 h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_ALBUMS ? 'text-purple-500' : 'text-blue-200' }}"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="mt-1 text-sm">Albums</span>
                </a>

                <a
                href="{{ USER_DASHBOARD_SETTINGS }}"
                class="hover:bg-blue-800 hover:shadow-inner hover:text-cool-gray-400
                {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_SETTINGS ? 'bg-blue-800 shadow-inner text-cool-gray-400' : 'text-blue-100' }}
                group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium">
                    <svg
                    class="group-hover:text-cool-gray-400 h-6 w-6
                    {{ $_SERVER['REQUEST_URI'] == USER_DASHBOARD_SETTINGS ? 'text-cool-gray-400' : 'text-blue-200' }}"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="mt-1 text-sm">Paramètres</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Content area -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Main content -->
        <div class="flex-1 flex items-stretch overflow-hidden">
            <main class="relative flex-1 overflow-x-visible">
                <button
                        @click="showHelp = !showHelp"
                        :aria-expanded="showHelp ? 'true' : 'false'"
                        :class="showHelp ? 'bg-gray-100 hover:bg-gray-200' : 'bg-yellow-50 hover:bg-yellow-100'"
                        :class="{showHelp : 'active'}"
                        type="button"
                        class="flex items-center justify-center absolute right-0 top-0 transform inset-y-0 p-1 bg-white bg-gray-100 transform shadow">
                    <svg :class="showHelp ? 'rotate-180 order-last' : 'rotate-0'"
                         class="transform text-true-gray-400 w-4 h-4" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <svg class="text-true-gray-400 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </button>
                <!-- Primary column -->
                <section aria-labelledby="primary-column"
                         class="min-w-0 flex-1 p-4 h-full flex flex-col overflow-hidden lg:order-last">
                    <!-- Your content -->
                    {{ $dashboardMain }}
                </section>
            </main>

            <!-- Secondary column (hidden on smaller screens) -->
            <aside
                    x-show="showHelp"
                    class="p-4 bg-white border-l border-gray-200 overflow-y-auto lg:block overflow-visible"
                    style="width:425px">
                <!-- Your content -->
                <div class="flex space-x-1 text-true-gray-400 italic">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Informations utiles</span>
                </div>
                <div class="my-2 h-0.5 w-full bg-gradient-to-r from-gray-200 to-gray-50"></div>
                {{ $dashboardAside }}
            </aside>
        </div>
    </div>
</div>