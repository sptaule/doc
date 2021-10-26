@extends('admin.layout')

@section('admin.layouts.main')

    <form action="" method="post" class="grid grid-flow-row grid-cols-1 xl:grid-cols-2 2xl:grid-cols-3 gap-x-12 w-full space-y-2">
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
        <div class="bg-indigo-50 shadow-md p-2">
            {{ partial('input', ['name' => 'facebook_url', 'default_value' => $facebookUrl, 'label' => '<i class="fab fa-facebook-square text-blue-500 align-base mr-0.5 text-2xl"></i> <span class="leading-3 inline-flex">Facebook</span>']) }}
        </div>
        <div class="bg-indigo-50 shadow-md p-2">
            {{ partial('input', ['name' => 'instagram_url', 'default_value' => $instagramUrl, 'label' => '<i class="fab fa-instagram-square text-purple-500 align-base mr-0.5 text-2xl"></i> <span class="leading-3 inline-flex">Instagram</span>']) }}
        </div>
        <div class="bg-indigo-50 shadow-md p-2">
            {{ partial('input', ['name' => 'youtube_url', 'default_value' => $youtubeUrl, 'label' => '<i class="fab fa-youtube-square text-red-500 align-base mr-0.5 text-2xl"></i> <span class="leading-3 inline-flex">YouTube</span>']) }}
        </div>
        <div class="bg-indigo-50 shadow-md p-2">
            {{ partial('input', ['name' => 'whatsapp_url', 'default_value' => $whatsappUrl, 'label' => '<i class="fab fa-whatsapp-square text-green-500 align-base mr-0.5 text-2xl"></i> <span class="leading-3 inline-flex">WhatsApp</span>']) }}
        </div>
        <div class="bg-indigo-50 shadow-md p-2">
            {{ partial('input', ['name' => 'twitter_url', 'default_value' => $twitterUrl, 'label' => '<i class="fab fa-twitter-square text-cyan-500 align-base mr-0.5 text-2xl"></i> <span class="leading-3 inline-flex">Twitter</span>']) }}
        </div>
        <div class="bg-indigo-50 shadow-md p-2">
            {{ partial('input', ['name' => 'snapchat_url', 'default_value' => $snapchatUrl, 'label' => '<i class="fab fa-snapchat-square text-yellow-500 align-base mr-0.5 text-2xl"></i> <span class="leading-3 inline-flex">Snapchat</span>']) }}
        </div>
        <button type="submit" class="btn submit">Valider les modifications</button>
    </form>

@endsection