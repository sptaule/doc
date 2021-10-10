@extends('admin.guest_layout')

@section('admin.specials.content')
<div class="flex items-center min-h-screen p-6">
    <div class="flex-1 h-auto max-w-4xl mx-auto overflow-hidden z-50 bg-white rounded-lg shadow-xl">
        <form class="flex flex-col overflow-y-auto md:flex-row" method="POST" enctype="multipart/form-data">

            @php
                echo csrf_input();
            @endphp

            <div class="w-full flex flex-col items-center justify-center p-6 sm:p-12">

                <img aria-hidden="true" width="250" class="select-none" src="{{ LOGO_FULL }}" alt="">

                <h1 class="font-extralight mt-4">- Installation -</h1>

                <div class="w-full grid grid-cols-2 gap-4 p-4 space-y-3 border-l-4 border-scuba-light my-8">
                    <h2 class="w-full text-left col-span-full font-extralight text-xl flex flex-col border-l-2 border-scuba-light pl-4">
                        <span class="text-scuba-light text-shadow-md">Création de l'administrateur</span>
                        <span class="font-extralight text-sm text-ray-500 italic">D'autres comptes administrateurs pourront être créés par la suite.</span>
                    </h2>
                    <div>
                        {{ partial('input', ['name' => "lastname", 'label' => "Nom", "default_value" => "Chaplain"]) }}
                        <p class="text-gray-600 italic font-light text-sm">Votre nom.</p>
                    </div>
                    <div>
                        {{ partial('input', ['name' => "firstname", 'label' => "Prénom", "default_value" => "Lucas"]) }}
                        <p class="text-gray-600 italic font-light text-sm">Votre prénom.</p>
                    </div>
                    <div>
                        {{ partial('input', ['name' => "email", 'label' => "Email", "default_value" => "lecas83@gmail.com"]) }}
                        <p class="text-gray-600 italic font-light text-sm">Vous pourrez la modifier par la suite.</p>
                    </div>
                    <div class="col-span-full"></div>
                    <div>
                        {{ partial('input', ['name' => "password", 'label' => "Mot de passe", 'type' => 'password', "default_value" => "123456789@@@"]) }}
                        <p class="text-gray-600 italic font-light text-sm">Minimum 8 caractères.<br>Privilégiez différents caractères (<b class="font-mono">0-9 a-z A-Z @_€+-*</b>).</p>
                        <p class="text-gray-600 italic font-light text-sm">Exemple d'un bon mot de passe : <b class="font-mono">BateauMonolithe06@</b></p>
                    </div>
                    <div>
                        {{ partial('input', ['name' => "password_conf", 'label' => "Confirmation", 'type' => 'password', "default_value" => "123456789@@@"]) }}
                    </div>
                </div>

                <div class="w-full h-0.5 bg-gray-200"></div>

                <div class="w-full grid grid-cols-2 gap-4 p-4 space-y-3 border-l-4 border-scuba-green my-8">
                    <h2 class="w-full text-left col-span-full font-extralight text-xl flex flex-col border-l-2 border-scuba-green pl-4">
                        <span class="text-scuba-green text-shadow-md">Détails du club</span>
                        <span class="font-extralight text-sm text-ray-500 italic">Des détails supplémentaires pourront être ajoutés par la suite.</span>
                    </h2>
                    <div>
                        {{ partial('input', ['name' => "club", 'label' => "Nom du club", "default_value" => "Les Plongeurs du Dimanche"]) }}
                        <p class="text-gray-600 italic font-light text-sm">Vous pourrez le modifier par la suite.</p>
                    </div>
                    <div class="col-span-full">
                        {{ partial('file', ['name' => "logo", 'label' => "Logo du club"]) }}
                        <p class="text-gray-600 italic font-light text-sm">Choisissez le logo du club. JPG ou PNG accepté.</p>
                    </div>
                </div>

                <div class="w-full h-0.5 bg-gray-200"></div>

                <div class="w-full grid grid-cols-2 gap-4 p-4 space-y-3 border-l-4 border-scuba-dark my-8">
                    <h2 class="w-full text-left col-span-full font-extralight text-xl flex flex-col border-l-2 border-scuba-dark pl-4">
                        <span class="text-scuba-dark text-shadow-md">Configuration de la base de données</span>
                    </h2>
                    <div>
                        {{ partial('input', ['name' => "db_host", 'label' => "Hôte de la base", "default_value" => "localhost", 'required' => true]) }}
                        <p class="text-gray-600 italic font-light text-sm">Hôte de la base de données.</p>
                        <p class="text-gray-600 italic font-light text-sm">Par défaut <b class="font-mono">localhost</b>.</p>
                    </div>
                    <div>
                        {{ partial('input', ['name' => "db_name", 'label' => "Nom de la base", "default_value" => "scuba", 'required' => true]) }}
                        <p class="text-gray-600 italic font-light text-sm">Le nom que porte la base de données dans laquelle <em>Scuba</em> doit faire son installation.</p>
                    </div>
                    <div>
                        {{ partial('input', ['name' => "db_username", 'label' => "Utilisateur de la base", "default_value" => "root", 'required' => true]) }}
                        <p class="text-gray-600 italic font-light text-sm">L'utilisateur qui a les droits d'accès nécessaires à la base de données.</p>
                    </div>
                    <div>
                        {{ partial('input', ['name' => "db_password", 'label' => "Mot de passe de la base", 'type' => 'password', "default_value" => "apozpoepo", 'required' => true]) }}
                        <p class="text-gray-600 italic font-light text-sm">Le mot de passe requis pour se connecter à la base.</p>
                    </div>
                    <div class="col-span-full flex items-center justify-center">
                        <button class="btn bg-scuba-dark text-white" id="checkDatabaseCredentials" type="button">Vérifier la connexion</button>
                    </div>
                </div>

                <button class="col-span-full btn btn-submit py-4 text-xl disabled:opacity-50 disabled:cursor-not-allowed" id="submitSetup" type="submit" disabled>Installer <b>Scuba</b></button>
            </div>

        </form>
    </div>
</div>

<script src="/assets/custom_scripts/checkIdenticalPasswords.js"></script>
<script src="/assets/custom_scripts/checkDatabaseCredentials.js"></script>
@endsection