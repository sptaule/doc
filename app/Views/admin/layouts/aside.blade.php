<div class="flex h-screen overflow-y-hidden bg-white" x-data="setup()"
     x-init="$refs.loading.classList.add('hidden')">
    <!-- Loading screen -->
    <div
            x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-white bg-black bg-opacity-50"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
    >
        Chargement en cours...
    </div>

    <!-- Sidebar backdrop -->
    <div
            x-show.in.out.opacity="isSidebarOpen"
            class="fixed inset-0 z-10 bg-black bg-opacity-20 lg:hidden"
            style="backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px)"
    ></div>

<!-- Sidebar -->
<aside
        x-transition:enter="transition transform duration-300"
        x-transition:enter-start="-translate-x-full opacity-30  ease-in"
        x-transition:enter-end="translate-x-0 opacity-100 ease-out"
        x-transition:leave="transition transform duration-300"
        x-transition:leave-start="translate-x-0 opacity-100 ease-out"
        x-transition:leave-end="-translate-x-full opacity-0 ease-in"
        class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
        :class="{'-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen}"
>
    <!-- sidebar header -->
    <div class="flex items-center justify-between flex-shrink-0 p-2"
         :class="{'lg:justify-center': !isSidebarOpen}">
        <div class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
            <img width="150px" src="{{ LOGO_FULL }}" alt="">
        </div>

        <button @click="toggleSidebarMenu()" class="p-2 rounded-md lg:hidden">
            <i class="fas fa-times-circle text-2xl text-red-500" :class="{'transform transition-transform -rotate-180': isSidebarOpen}"></i>
        </button>
    </div>
    <!-- Sidebar links -->
    <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
        <ul class="p-2 overflow-hidden">
            <li>
                <a href="{{ ADMIN_DASHBOARD }}" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-home text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Tableau de bord</span>
                </a>
            </li>

            <div class="sidebar-separator relative mb-1 mt-6">
                <div class="text-lg font-extralight rounded-lg bg-gray-200 inline-block px-6 h-0.5 w-full" :class="{ 'pl-4 pt-1': !isSidebarOpen }">
                    <div class="bg-white px-2 w-max -mt-3.5 flex flex-row items-center justify-center space-x-1.5">
                        <img src="https://cdn-icons-png.flaticon.com/16/681/681392.png" alt="">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-scuba-green to-scuba-dark" :class="{ 'lg:hidden': !isSidebarOpen }">
                            Utilisateurs
                        </span>
                    </div>
                </div>
            </div>

            <li>
                <a href="{{ ADMIN_USERS }}" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-users text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Liste des utilisateurs</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-certificate text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Certificats</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-id-badge text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Licences</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-heart text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Adhésions</span>
                </a>
            </li>

            <div class="sidebar-separator relative mb-1 mt-6">
                <div class="text-lg font-extralight rounded-lg bg-gray-200 inline-block px-6 h-0.5 w-full" :class="{ 'pl-4 pt-1': !isSidebarOpen }">
                    <div class="bg-white px-2 w-max -mt-3.5 flex flex-row items-center justify-center space-x-1.5">
                        <img src="https://cdn-icons-png.flaticon.com/16/3767/3767108.png" alt="">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-scuba-green to-scuba-dark" :class="{ 'lg:hidden': !isSidebarOpen }">
                            Évènements
                        </span>
                    </div>
                </div>
            </div>

            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-calendar-alt text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Liste des évènements</span>
                </a>
            </li>
            <li>
                <a href="{{ ADMIN_EVENT_TYPES }}" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-th-list text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Types d'évènements</span>
                </a>
            </li>

            <div class="sidebar-separator relative mb-1 mt-6">
                <div class="text-lg font-extralight rounded-lg bg-gray-200 inline-block px-6 h-0.5 w-full" :class="{ 'pl-4 pt-1': !isSidebarOpen }">
                    <div class="bg-white px-2 w-max -mt-3.5 flex flex-row items-center justify-center space-x-1.5">
                        <img src="https://cdn-icons-png.flaticon.com/16/679/679922.png" alt="">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-scuba-green to-scuba-dark" :class="{ 'lg:hidden': !isSidebarOpen }">
                            Commandes
                        </span>
                    </div>
                </div>
            </div>

            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-clock text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">En attente</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-check-double text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Terminées</span>
                </a>
            </li>

            <div class="sidebar-separator relative mb-1 mt-6">
                <div class="text-lg font-extralight rounded-lg bg-gray-200 inline-block px-6 h-0.5 w-full" :class="{ 'pl-4 pt-1': !isSidebarOpen }">
                    <div class="bg-white px-2 w-max -mt-3.5 flex flex-row items-center justify-center space-x-1.5">
                        <img src="https://cdn-icons-png.flaticon.com/16/3528/3528221.png" alt="">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-scuba-green to-scuba-dark" :class="{ 'lg:hidden': !isSidebarOpen }">
                            Apparence
                        </span>
                    </div>
                </div>
            </div>

            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-sticky-note text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Pages</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-bars text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Menu</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-cog text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Options</span>
                </a>
            </li>

            <div class="sidebar-separator relative mb-1 mt-6">
                <div class="text-lg font-extralight rounded-lg bg-gray-200 inline-block px-6 h-0.5 w-full" :class="{ 'pl-4 pt-1': !isSidebarOpen }">
                    <div class="bg-white px-2 w-max -mt-3.5 flex flex-row items-center justify-center space-x-1.5">
                        <img src="https://cdn-icons-png.flaticon.com/16/3132/3132084.png" alt="">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-scuba-green to-scuba-dark" :class="{ 'lg:hidden': !isSidebarOpen }">
                            Paramètres
                        </span>
                    </div>
                </div>
            </div>

            <li>
                <a href="#" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-euro-sign text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Tarifs</span>
                </a>
            </li>
            <li>
                <a href="{{ ADMIN_DIVING_LEVELS }}" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-layer-group text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Niveaux de plongée</span>
                </a>
            </li>
            <li>
                <a href="{{ ADMIN_DOCUMENTS }}" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-file-alt text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Documents requis</span>
                </a>
            </li>
            <li>
                <a href="{{ ADMIN_CLUB }}" class="flex items-center space-x-2 rounded-md hover:bg-gray-200 border border-transparent hover:border-gray-300" :class="{'justify-center': !isSidebarOpen}">
                    <span class="h-8 w-8 flex items-center justify-center"><i class="fas fa-ship text-scuba-green text-base"></i></span>
                    <span :class="{ 'lg:hidden': !isSidebarOpen }" class="text-gray-800 text-sm">Informations du club</span>
                </a>
            </li>
            <!-- Sidebar Links... -->
        </ul>
    </nav>
    <!-- Sidebar footer -->
    <div class="flex-shrink-0 p-2 border-t max-h-14">
        <button class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 hover:bg-red-500 text-gray-600 hover:text-white border rounded-md focus:outline-none focus:ring">
            <span class="h-6 w-6 flex items-center justify-center"><i class="fas fa-sign-out-alt"></i></span>
            <span :class="{'lg:hidden': !isSidebarOpen}">Déconnexion</span>
        </button>
    </div>
</aside>