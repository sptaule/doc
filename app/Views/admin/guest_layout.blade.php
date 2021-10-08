{{--Used for special content, layout should not be accesible through normal pages--}}
<!DOCTYPE html>
<html lang="fr">
<head>
    @include('admin.layouts.head')
</head>
<style>
    body {
        background-color: #c4cfde;
        background-image: radial-gradient(#19ad72 0.9px, transparent 0.9px), radial-gradient(#25367c 0.9px, #eaf1f0 0.9px);
        background-size: 84px 84px;
        background-position: 0 0, 42px 42px;
    }
</style>
    <body>
        @include('admin.specials.content')
    </body>
    {{ partial('mixed_flash_message') }}
</html>