@extends('admin.guest_layout')

@section('admin.specials.content')

    <div class="min-h-screen bg-gradient-to-t from-scuba-dark to-scuba-light flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="flex flex-col space-y-2 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="rounded-full bg-gray-50 w-24 h-24 flex items-center justify-center mx-auto shadow-2xl">
                <img class="mx-auto h-12 w-auto" src="/ressources/images/scuba/logo.png" alt="Logo du club">
            </div>
            <p class="text-center text-base text-gray-300 font-arima font-bold pb-4">
                {{ \App\Models\Club::getInfo('club_name') }}
            </p>
            <h2 class="text-center text-3xl font-extrabold text-gray-100">
                Se connecter
            </h2>
            <p class="text-center text-sm text-gray-300 font-arima">
                - Administration -
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md mx-4">
            <div class="bg-white py-8 px-4 shadow-xl border border-blue-400 sm:rounded-lg sm:px-10 rounded-xl">
                <form class="space-y-4" action="#" method="POST">

                    @php echo csrf_input() @endphp

                    <div>
                        <div class="mt-1">
                            {{ partial('input', ['name' => 'email', 'label' => 'Adresse email', 'type' => 'email']) }}
                        </div>
                    </div>

                    <div>
                        <div class="mt-1">
                            {{ partial('input', ['name' => 'password', 'label' => 'Mot de passe', 'type' => 'password']) }}
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-scuba-green hover:bg-scuba-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Connexion
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection