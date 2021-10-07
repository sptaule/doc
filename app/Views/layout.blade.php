<!DOCTYPE html>
<html lang="fr">
<head>
    @include('layouts.head')
</head>
    <body
        class="{{
            (is_on_page(USER_DASHBOARD) || is_on_page(USER_EDIT))
            && isset($_SESSION['user'])
            ? 'bg-aup-orange bg-opacity-80'
            : 'bg-aup-white' }} bg-fixed">

        <header class="sticky top-0 z-50">
            @include('layouts.header')
        </header>

        <main class="bg-aup-orange">
            @include('layouts.main')
        </main>

        <footer class="bg-aup-white py-8">
            @include('layouts.footer')
        </footer>

    </body>
</html>