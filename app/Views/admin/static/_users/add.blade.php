@extends('admin.layout')

@section('admin.layouts.main')

    <div class="controls w-full rounded flex items-center justify-start space-x-2">
        <div class="text-white font-arima inline-block h-12 rounded text-lg flex items-center justify-center">
            <span>{!! $title !!}</span>
        </div>
        <div class="h-10 w-0.5 bg-gray-500"></div>
        <a class="btn cancel py-3" href="{{ ADMIN_USERS }}">Annuler</a>
    </div>

    <div id="content" class="w-4/6">
        <form action="" method="post" class="space-y-10">
            @php echo csrf_input() @endphp
            <div class="border-l-2 border-green-400 pl-4">
                <h2 class="leading-6 font-arima text-green-400 text-lg mb-3">Informations générales</h2>
                <div class="flex flex-col sm:flex-row flex-auto space-x-4">
                    {{ partial('input', ['name' => 'lastname', 'label' => 'Nom']) }}
                    {{ partial('input', ['name' => 'firstname', 'label' => 'Prénom']) }}
                    {{ partial('select', ['name' => 'genre', 'label' => 'Genre', 'options' => $genres, 'option_key_label' => 'name']) }}
                </div>
                <div class="flex flex-col sm:flex-row flex-auto space-x-4">
                    {{ partial('input', ['name' => 'birthdate', 'label' => 'Date de naissance', 'type' => 'date']) }}
                </div>
                <div class="flex flex-col sm:flex-row flex-auto space-x-4">
                    {{ partial('input', ['name' => 'email', 'label' => 'Email', 'type' => 'email']) }}
                    {{ partial('input', ['name' => 'phone', 'label' => 'Téléphone (optionnel)']) }}
                </div>
                <div class="flex flex-col sm:flex-row flex-auto space-x-4">
                    {{ partial('input', ['name' => 'password', 'label' => 'Mot de passe', 'type' => 'password', 'hint' => 'Minimum 8 caractères']) }}
                    {{ partial('input', ['name' => 'password_conf', 'label' => 'Mot de passe (confirmation)', 'type' => 'password']) }}
                </div>
            </div>
            <div class="border-l-2 border-blue-400 pl-4">
                <h2 class="leading-6 font-arima text-blue-400 text-lg mb-3">Informations relatives à la plongée</h2>
                <div class="flex flex-col sm:flex-row flex-auto space-x-4">
                    {{ partial('input', ['name' => 'credits', 'label' => 'Crédits plongée', 'type' => 'number', 'min' => 0, 'max' => 100]) }}
                    {{ partial('select', ['name' => 'diving_level_id', 'label' => 'Niveau de plongée', 'options' => $divingLevels, 'option_key_label' => 'name', 'tableDisplay' => true]) }}
                </div>
            </div>
            <button type="submit" class="btn btn-submit">Valider</button>
        </form>
    </div>

@endsection