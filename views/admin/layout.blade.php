<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="fr">
<head>
    @include('admin.layouts.head')
</head>
<body class="bg-gray-100">

        @include('admin.layouts.aside')
        @include('admin.layouts.header')
        @include('admin.layouts.main')
        @include('admin.layouts.footer')

</body>
</html>