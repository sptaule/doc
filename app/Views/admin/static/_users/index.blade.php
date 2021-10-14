@extends('admin.layout')

@section('admin.layouts.main')

    <link rel="stylesheet" href="{{ MIXITUP . 'css' }}">

    <div class="w-full">
        <div class="controls rounded flex items-center justify-start space-x-2">
            <a class="btn add py-3" href="{{ ADMIN_USER_ADD }}">Créer un utilisateur</a>
            <div class="h-10 w-0.5 bg-gray-500"></div>
            <div class="flex items-center justify-start space-x-1">
                <button type="button" class="control rounded bg-white bg-opacity-50 p-2.5" data-filter="all"><span class="text-white">Tous</span></button>
                <button type="button" class="control rounded bg-white bg-opacity-50 p-2.5" data-filter=".member"><span class="text-white">Membres</span></button>
                <button type="button" class="control rounded bg-white bg-opacity-50 p-2.5" data-filter=".director"><span class="text-white">Directeurs</span></button>
                <button type="button" class="control rounded bg-white bg-opacity-50 p-2.5" data-filter=".administrator"><span class="text-white">Admins</span></button>
             </div>
            <div class="h-10 w-0.5 bg-gray-500"></div>
            <div class="flex items-center justify-start rounded" style="background:#444">
                <div class="text-white px-2">Dernière connexion</div>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="last-connection:asc" title="Ordre croissant">
                    <i class="fas fa-arrow-alt-up text-base"></i>
                </button>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="last-connection:desc" title="Ordre décroissant">
                    <i class="fas fa-arrow-alt-down text-base"></i>
                </button>
            </div>
            <div class="h-10 w-0.5 bg-gray-500"></div>
            <div class="flex items-center justify-start rounded" style="background:#444">
                <div class="text-white px-2">Date d'inscription</div>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="registration-date:asc" title="Ordre croissant">
                    <i class="fas fa-arrow-alt-up text-base"></i>
                </button>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="registration-date:desc" title="Ordre décroissant">
                    <i class="fas fa-arrow-alt-down text-base"></i>
                </button>
            </div>
        </div>
        <div class="container">
            @foreach($users as $k => $user)
                <div
                    data-last-connection="{{ display_date($user->last_connection, 'Y-m-d') }}"
                    data-registration-date="{{ display_date($user->created_at, 'Y-m-d') }}"
                    class="relative p-2 shadow filter hover:brightness-105 mix {{ $user->rank_id == 1 ? 'member' : '' }} {{ $user->rank_id == 2 ? 'director' : '' }} {{ $user->rank_id == 3 ? 'administrator' : '' }}">
                    <div class="py-3">
                        <h1 class="text-black w-full flex flex-col space-x-2 items-center justify-center font-bold text-gray-600 font-arima text-lg">
                            <a href="{{ ADMIN_USER_VIEW . $user->id }}" class="text-center">{{ $user->firstname }} {{ $user->lastname }}</a>
                            <span class="text-sm font-opensans font-thin">{{ $user->email }}</span>
                        </h1>
                        <a href="{{ ADMIN_USER_VIEW . $user->id }}" class="flex items-center justify-center mt-2">
                            <img src="https://i.pravatar.cc/150?img={{ $k }}" class="shadow-lg h-20 w-20 rounded-full" alt="">
                        </a>
                        <div class="absolute top-0 left-0 bg-white w-full grid grid-cols-2 gap-0 text-gray-500">
                            <a href="{{ ADMIN_USER_VIEW . $user->id }}" class="flex items-center justify-center p-1.5 shadow-sm hover:bg-blue-200 hover:text-blue-500" title="Accéder à la fiche complète">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </a>
                            <a href="{{ ADMIN_USER_EDIT . $user->id }}" class="flex items-center justify-center p-1.5 shadow-sm hover:bg-yellow-200 hover:text-yellow-500" title="Modifier les informations">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="gap"></div>
        </div>
    </div>

    <script>
        let containerEl = document.querySelector('.container');
        let mixer = mixitup(containerEl, {
            animation: {
                effects: 'fade scale stagger(60ms)'
            },
            load: {
                filter: 'none'
            }
        });
        containerEl.classList.add('mixitup-ready');
        mixer.show()
            .then(function() {
                mixer.configure({
                    animation: {
                        effects: 'fade scale'
                    }
                });
            });
    </script>

@endsection