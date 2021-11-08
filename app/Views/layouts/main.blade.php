<div
class="h-auto py-12"
style="
    background-color: #003380;
    min-height:60vh;
    background-size:cover;
    background: #DEDEDE, url('/ressources/images/wallpapers/3.jpg');
    background-attachment:fixed;
    background-repeat:no-repeat"
    >
    <div class="{{ $mainContentStyle ?? 'mx-auto max-w-7xl bg-white rounded-md p-8' }}">
        @yield('layouts.main')
    </div>
</div>