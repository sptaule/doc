<!-- Main content -->
<main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
    <!-- Main content header -->
    <div class="flex flex-col items-center justify-between pb-2 space-y-2 lg:items-center lg:space-y-0 lg:flex-row">
        <h1 class="text-xl whitespace-nowrap text-gray-700 font-arima border-l-4 px-2 py-1 border-scuba-green shadow rounded">{{ $title }}</h1>
    </div>

    <div class="flex flex-col items-start justify-between space-y-2">
        @yield('admin.layouts.main')
    </div>

</main>