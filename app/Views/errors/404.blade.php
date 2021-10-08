@extends('admin.guest_layout')

@section('admin.specials.content')
    <div class="flex items-center min-h-screen p-6">
        <div class="flex-1 max-w-4xl mx-auto overflow-hidden z-50 bg-white rounded-lg shadow-xl">
            <div class="mx-auto p-6 text-center">
                <h1 class="inline-block font-opensans font-extrabold text-4xl text-scuba-green">404</h1>
                <p class="text-gray-700 py-4">La page demandée n'a pas été trouvée.</p>
                <p class="text-gray-700 py-4">
                    <a href="">Retourner à l'accueil</a>
                </p>
            </div>
        </div>
    </div>

@endsection