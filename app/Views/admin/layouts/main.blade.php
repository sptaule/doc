<!-- Main content -->
<main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
    <!-- Main content header -->
    <div class="flex flex-col items-start justify-between pb-6 space-y-2 border-b lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-2xl font-semibold whitespace-nowrap text-gray-800">Tableau de bord</h1>
    </div>

    <div class="flex flex-col items-start justify-between py-6 space-y-2 lg:items-center lg:space-y-0 lg:flex-row">
        @yield('admin.layouts.main')
    </div>

</main>