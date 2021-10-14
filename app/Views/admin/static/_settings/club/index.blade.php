@extends('admin.layout')

@section('admin.layouts.main')

    <form action="" method="post" class="grid grid-flow-row grid-cols-3 gap-x-12 w-full space-y-2">
        @php echo csrf_input() @endphp
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('input', ['name' => 'club_name', 'label' => 'Nom du club', 'default_value' => $clubName]) }}
        </div>
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('input', ['name' => 'club_description', 'label' => 'Slogan du club', 'default_value' => $clubDescription]) }}
        </div>
        <div class="col-span-full"></div>
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('input', ['name' => 'super_user_firstname', 'label' => 'Prénom du super administrateur', 'default_value' => $superUserFirstname]) }}
        </div>
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('input', ['name' => 'super_user_lastname', 'label' => 'Nom du super administrateur', 'default_value' => $superUserLastname]) }}
        </div>
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('input', ['name' => 'super_user_email', 'label' => 'Email du super administrateur', 'default_value' => $superUserEmail]) }}
        </div>
        <div class="col-span-full"></div>
        <div class="bg-teal-50 shadow-md p-2 flex flex-col items-start justify-start">
            <p class="text-gray-600 italic text-sm">Si vous souhaitez fermer les inscriptions, cochez la case ci-dessous</p>
            {{ partial('checkbox', [
                'id' => 'allow_registrations',
                'name' => 'allow_registrations',
                'label' => 'Autoriser les inscriptions',
                'subLabel' => "Si non, personne ne pourra créer de compte sur le site.",
                'state' => $allowRegistrations == 1 ? 'checked' : ''])
            }}
        </div>
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('radio', [
                'id' => 'date_format',
                'groupLabel' => 'Format de date préféré',
                'subLabel' => "Toutes les dates affichées sur le site auront ce format",
                'name' => 'date_format',
                'value' => $dateFormat,
                'options' => [
                    '%d/%m/%y' => strftime('%d/%m/%y'),
                    '%d/%m/%Y' => strftime('%d/%m/%Y'),
                    '%a %d/%m/%y' => strftime('%a %d/%m/%y'),
                    '%A %d/%m/%y' => strftime('%A %d/%m/%y'),
                    '%a %d %b %Y' => strftime('%a %d %b %Y'),
                    '%A %d %b %Y' => strftime('%A %d %b %Y'),
                    '%A %d %B %Y' => strftime('%A %d %B %Y'),
                ]])
            }}
        </div>
        <div class="bg-teal-50 shadow-md p-2">
            {{ partial('radio', [
                'id' => 'time_format',
                'groupLabel' => "Format d'heure préféré",
                'subLabel' => "Toutes les heures affichées sur le site auront ce format",
                'name' => 'time_format',
                'value' => $timeFormat,
                'options' => [
                    '%Hh' => strftime('%Hh'),
                    '%R' => strftime('%R'),
                    '%Hh%M' => strftime('%Hh%M'),
                    '%H:%M:%S' => strftime('%H:%M:%S'),
                    '%Hh %Mm, %Ss' => strftime('%Hh %Mm, %Ss'),
                ]])
            }}
        </div>
        <div class="col-span-full"></div>
        <button type="submit" class="btn submit">Valider les modifications</button>
    </form>

@endsection