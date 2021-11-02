<div class="flex flex-col flex-1 h-full overflow-hidden">

    <!-- Navbar -->
    <header class="flex-shrink-0 border-b">
        <div class="flex items-center justify-between p-2">
            <!-- Navbar left -->
            <div class="flex items-center space-x-3">
                <img class="p-2 lg:hidden" src="{{ LOGO }}" width="45px" alt="">
                <!-- Toggle sidebar button -->
                <button @click="toggleSidebarMenu()" class="p-2 rounded-md focus:outline-none focus:ring ring-gray-500">
                    <i class="fas fa-angle-double-right text-gray-500" :class="{'transform transition-transform -rotate-180': isSidebarOpen}"></i>
                </button>
            </div>

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">
                <div class="items-center hidden space-x-3 md:flex">

                    <a target="_blank" href="{{ PUBLIC_HOME }}" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring ring-gray-500 flex items-center justify-center text-sm space-x-1.5">
                        <svg class="w-5 h-5" fill="none" stroke="rgb(107, 114, 128)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        <span>Voir le site</span>
                    </a>

                    <!-- Documentation Button -->
                    <a id="demo01" href="#animatedModal" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring ring-gray-500 flex items-center justify-center text-sm space-x-1.5">
                        <svg class="w-5 h-5" fill="none" stroke="rgb(107, 114, 128)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        <span>Aide</span>
                    </a>
                    {{ partial('documentation') }}
                    <!-- Options Button -->
                    <div class="relative" x-data="{ isOpen: false }">
                        <button
                            @click="isOpen = !isOpen"
                            class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring ring-gray-500"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="rgb(107, 114, 128)" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                        </button>

                        <!-- Dropdown card -->
                        <div
                            @click.away="isOpen = false"
                            x-show.transition.opacity="isOpen"
                            class="absolute w-40 max-w-sm mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                        >
                            <div class="p-4 font-medium border-b">
                                <span class="text-gray-800">Options</span>
                            </div>
                            <ul class="flex flex-col p-2 my-2 space-y-1">
                                <li>
                                    <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another
                                        Link</a>
                                </li>
                            </ul>
                            <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                                <a href="#">See All</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- avatar button -->
                <div class="relative" x-data="{ isOpen: false }">
                    <button @click="isOpen = !isOpen"
                            class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring ring-gray-500">
                        <img
                            class="object-cover w-8 h-8 rounded-full"
                            src="https://avatars.githubusercontent.com/u/5262097?v=4"
                            alt="Lucas Chaplain"
                        />
                    </button>

                    <!-- Dropdown card -->
                    <div
                            @click.away="isOpen = false"
                            x-show.transition.opacity="isOpen"
                            class="origin-top-left absolute -left-4 top-8 transform -translate-x-3/4 mt-3 bg-white rounded-md shadow-lg w-64 z-50"
                    >
                        <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                            <span class="font-extralight text-gray-800">Connecté en tant que</span>
                            <span class="text-gray-800 leading-5">{{ session()->get('user')->firstname . ' ' . session()->get('user')->lastname }}</span>
                            <span class="text-sm text-gray-400 leading-3">{{ session()->get('user')->email }}</span>
                        </div>
                        <!-- Sidebar footer -->
                        <div class="flex-shrink-0 p-2 border-t max-h-14">
                            <a href="{{ ADMIN_LOGOUT }}" class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 hover:bg-red-500 text-gray-600 hover:text-white border rounded-md focus:outline-none focus:ring">
                                <span class="h-6 w-6 flex items-center justify-center"><i class="fas fa-sign-out-alt"></i></span>
                                <span>Déconnexion</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>