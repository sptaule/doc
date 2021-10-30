<!DOCTYPE html>
<html lang="fr">
<head>
    @include('admin.layouts.head')
</head>
<body
    class="bg-gray-100"
    x-data="setup()"
    x-init="$refs.loading.classList.add('hidden')">

        @include('common.loader')

        @include('admin.layouts.aside')

        @include('admin.layouts.header')

        @include('admin.layouts.main')

        @include('admin.layouts.footer')

</body>
</html>