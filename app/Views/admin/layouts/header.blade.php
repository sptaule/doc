<div class="flex flex-col flex-1 h-full overflow-hidden">

    <!-- Navbar -->
    <header class="flex-shrink-0 border-b">
        <div class="flex items-center justify-between p-2">
            <!-- Navbar left -->
            <div class="flex items-center space-x-3">
                <img class="p-2 lg:hidden" src="{{ LOGO }}" width="45px">
                <!-- Toggle sidebar button -->
                <button @click="toggleSidebarMenu()" class="p-2 rounded-md focus:outline-none focus:ring">
                    <i class="fas fa-angle-double-right text-gray-500" :class="{'transform transition-transform -rotate-180': isSidebarOpen}"></i>
                </button>
            </div>

            <!-- Navbar right -->
            <div class="relative flex items-center space-x-3">
                <div class="items-center hidden space-x-3 md:flex">

                    <!-- Documentation Button -->
                    <a id="demo01" href="#animatedModal" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring flex items-center justify-center text-sm space-x-1.5">
                        <i class="text-gray-500 fas fa-book"></i>
                        <span>Aide</span>
                    </a>
                    {{ partial('documentation') }}
                    <!-- Options Button -->
                    <div class="relative" x-data="{ isOpen: false }">
                        <button
                            @click="isOpen = !isOpen"
                            class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring"
                        >
                            <i class="w-6 h--6 text-gray-500 fas fa-sliders-h"></i>
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
                            class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
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
                            class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max z-50"
                    >
                        <div class="flex flex-col p-4 space-y-1 font-medium border-b">
                            <span class="font-extralight text-gray-800">Bonjour</span>
                            <span class="text-gray-800">Lucas Chaplain</span>
                            <span class="text-sm text-gray-400">contact@lucaschaplain.design</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>