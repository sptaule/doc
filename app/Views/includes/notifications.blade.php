<div x-data="{ open: false }">
    <button
        x-on:click="open = ! open"
        type="button"
        class="bg-gray-100 flex-shrink-0 rounded-full p-1 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
        <span class="sr-only">Voir les notifications</span>
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </button>
    <div
        x-show="open"
        x-transition
        class="dropdown absolute right-0 mt-1 w-96 bg-gray-100 rounded-md shadow-xl text-center border border-scuba-dark border-opacity-20">
        <div class="p-2 w-full flex flex-col items-start">
            <span class="text-gray-600 italic text-sm">Notifications</span>
            <div class="h-0.5 w-full bg-gray-200 my-1.5"></div>
            <span class="text-gray-400 italic text-sm">Aucune nouvelle notification</span>
        </div>
    </div>
</div>