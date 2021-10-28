<!DOCTYPE html>
<html lang="fr">
<head>
    @include('layouts.head')
</head>
    <body>

        <header class="sticky top-0 z-50">
            @include('layouts.header', ['navElements' => \App\Models\Navigation::getNav()])
        </header>

        <main>
            @include('layouts.main')
        </main>

        <footer>
            @include('layouts.footer')
        </footer>

        <div id="back2Top" class="hidden hover:shadow-lg bg-gray-200 text-center float-right cursor-pointer p-2 w-10 h-10 rounded-full hover:text-scuba-green fixed right-5 bottom-5">
            <i class="fas fa-arrow-up"></i>
        </div>
        <script src="/assets/custom_scripts/back-to-top.js"></script>

    </body>
</html>