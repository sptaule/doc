@extends('layout')

@section('layouts.main')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <div class="py-8 px-4 sm:rounded-lg sm:px-10 flex flex-col items-center justify-center">
            <h1 class="font-arima text-scuba-green text-3xl">Connectez-vous</h1>
            <p class="text-gray-700 text-center">
                Accédez à votre compte et aux différentes parties du site.<br>
                Retrouvez et participez aux évènements du club.<br>
                Gérez vos inscriptions.
            </p>
            <div class="my-8 text-gray-700">
                <p>
                    Vous n'avez pas encore de compte ?
                    <a class="link text-scuba-dark" href="{{ USER_REGISTER }}">Inscrivez-vous !</a>
                </p>
            </div>
        </div>

        <div class="py-8 px-4 sm:rounded-lg sm:px-32">

            <form class="space-y-4" action="#" method="POST">

                @php echo csrf_input() @endphp

                <div>
                    <div class="mt-1">
                        {{ partial('input', ['name' => 'email', 'label' => 'Adresse email', 'type' => 'email', 'autofocus' => true]) }}
                    </div>
                </div>

                <div>
                    <div class="mt-1">
                        {{ partial('input', ['name' => 'password', 'label' => 'Mot de passe', 'type' => 'password']) }}
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold uppercase text-white bg-scuba-green hover:bg-scuba-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Connexion
                    </button>
                </div>

            </form>

            <div class="w-full mt-12 flex items-center justify-start">
                <a href="#!" class="flex space-x-1 text-sm text-scuba-dark">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
                    <span class="link">J'ai oublié mon mot de passe</span>
                </a>
            </div>

        </div>

    </div>

@endsection