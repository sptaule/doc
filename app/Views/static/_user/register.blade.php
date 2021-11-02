@extends('layout')

@section('layouts.main')

    <div class="w-full">

        <div class="py-8 px-4 sm:rounded-lg">

            <div class="py-8 px-4 sm:rounded-lg sm:px-10 grid grid-cols-2">
                <div class="flex flex-col items-center justify-center space-y-2">
                    <h1 class="font-arima text-scuba-dark text-3xl">Inscrivez-vous</h1>
                    <div class="h-0.5 w-12 bg-scuba-dark mt-2 mb-4"></div>
                    <p class="text-gray-700 text-center">
                        Rejoignez le club <b>{{ \App\Models\Club::getValue('club_name') }}</b><br>
                        en remplissant le formulaire ci-dessous
                    </p>
                </div>
                <div class="my-4 text-gray-700 flex flex-col items-center justify-center space-y-2">
                    <p class="text-sm">
                        Vous avez déjà un compte ?
                        <a class="link text-scuba-green" href="{{ USER_LOGIN }}">Connectez-vous !</a>
                    </p>
                </div>
            </div>

            <form class="space-y-4 grid grid-cols-1 md:grid-cols-2 gap-x-8 max-w-4xl mx-auto" action="#" method="POST">

                @php echo csrf_input() @endphp

                <div class="col-span-full flex flex-col items-center justify-center space-y-3">
                    <span class="text-gray-600 text-sm font-semibold">Sélectionnez votre sexe</span>
                    <div class="flex space-x-3">
                        <label>
                            <input type="radio" name="genre" value="Homme" required>
                            <img src="https://cdn-icons-png.flaticon.com/64/265/265674.png" class="shadow p-2" alt="Homme">
                        </label>
                        <label>
                            <input type="radio" name="genre" value="Femme">
                            <img src="https://cdn-icons-png.flaticon.com/64/2922/2922561.png" class="shadow p-2" alt="Femme">
                        </label>
                    </div>
                </div>

                <div class="col-span-full"></div>

                <div class="col-span-full grid grid-cols-3 gap-x-8 p-4 rounded-md shadow bg-red-200 relative">
                    <i class="fas fa-address-card text-shadow-sm text-4xl text-red-600 absolute -top-4 -left-4 transform -rotate-6"></i>
                    {{ partial('input', ['name' => "firstname", 'label' => "Prénom", 'autofocus' => true, 'required' => true]) }}
                    {{ partial('input', ['name' => "lastname", 'label' => "Nom", 'required' => true]) }}
                    {{ partial('input', ['name' => "birthdate", 'label' => "Date de naissance", 'required' => true]) }}
                    <p class="col-span-full mt-3 text-sm text-gray-600 italic">
                        <svg class="inline w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01"></path></svg>
                        Votre date de naissance <b>n'apparaitra pas</b> sur votre profil public
                    </p>
                </div>

                <div class="col-span-full"></div>

                <div class="col-span-full grid grid-cols-3 gap-x-8 p-4 rounded-md shadow bg-amber-200 relative">
                    <i class="fas fa-envelope-open text-shadow-sm text-4xl text-amber-600 absolute -top-4 -left-4 transform -rotate-6"></i>
                    {{ partial('input', ['name' => 'email', 'label' => 'Adresse email', 'type' => 'email', 'required' => true, 'size' => "col-span-2"]) }}
                    {{ partial('input', ['name' => 'phone', 'label' => 'Téléphone (optionnel)']) }}
                    <p class="col-span-full mt-3 text-sm text-gray-600 italic">
                        <svg class="inline w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01"></path></svg>
                        Vos informations de contact <b>n'apparaitront pas</b> sur votre profil public
                    </p>
                </div>

                <div class="col-span-full"></div>

                <div class="col-span-full grid grid-cols-2 gap-x-8 p-4 rounded-md shadow bg-green-200 relative">
                    <i class="fas fa-lock text-shadow-sm text-4xl text-green-600 absolute -top-4 -left-4 transform -rotate-6"></i>
                    <div>
                        {{ partial('password', ['name' => "password", 'label' => "Mot de passe", 'type' => 'password', 'required' => true]) }}
                        <p class="text-gray-600 italic font-light text-sm">Minimum 8 caractères</p>
                    </div>
                    {{ partial('password', ['name' => "password_conf", 'label' => "Confirmation", 'type' => 'password', 'required' => true]) }}
                </div>

                <div class="col-span-full p-4 rounded-md shadow bg-blue-200 relative">
                    <i class="fas fa-tint text-shadow-sm text-4xl text-blue-600 absolute -top-4 -left-4 transform -rotate-6"></i>
                    {{ partial('select', [
                        'name' => 'diving_level_id',
                        'label' => 'Niveau de plongée',
                        'subLabel' => 'Sélectionnez votre niveau de plongée dans la liste',
                        'options' => $divingLevels,
                        'option_key_label' => 'name',
                        'tableDisplay' => 3])
                    }}
                </div>

                <div class="col-span-full p-4 rounded-md shadow bg-purple-200 relative">
                    <i class="fas fa-certificate text-shadow-sm text-4xl text-purple-600 absolute -top-4 -left-4 transform -rotate-6"></i>
                    {{ partial('select', [
                        'name' => 'diving_level_id',
                        'label' => 'Niveau de plongée',
                        'subLabel' => 'Sélectionnez votre niveau de plongée dans la liste',
                        'options' => $divingLevels,
                        'option_key_label' => 'name',
                        'tableDisplay' => 3])
                    }}
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold uppercase text-white bg-scuba-green hover:bg-scuba-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Inscription
                    </button>
                </div>

            </form>

        </div>

    </div>

    <style>
        [type=radio] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        [type=radio] + img {
            border-radius: 10px;
            cursor: pointer;
        }
        [type=radio]:hover + img {
            box-shadow: 0 3px 10px -5px #30523f;
        }
        [type=radio]:checked + img {
            outline: 3px solid #1fac5f;
            box-shadow: 0 3px 15px -5px #1c1e21;
        }
    </style>

    <script>
        const datePicker = MCDatepicker.create({
            el: '#birthdate',
            bodyType: 'modal',
            dateFormat: "DD/MM/YYYY",
            customCancelBTN: "Annuler",
            customClearBTN: "Reset",
            customWeekDays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
            customMonths: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            firstWeekday: 1
        });
    </script>

    <script src="/assets/custom_scripts/checkIdenticalPasswords.js"></script>

@endsection