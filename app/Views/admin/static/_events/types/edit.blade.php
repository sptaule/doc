@extends('admin.layout')

@section('admin.layouts.main')

    <div id="section-action-nav" class="flex space-x-1.5 items-center p-2 rounded bg-gradient-to-r from-gray-50 to-transparent w-full">
        <a class="btn edit" href="{{ ADMIN_EVENT_TYPES }}">Annuler</a>
    </div>

    <div id="content" class="w-4/6">
        <form action="" method="post" class="space-y-10">
            @php echo csrf_input() @endphp
            <div class="border-l-2 border-green-400 pl-4 w-full space-y-4">
                <div class="w-full flex flex-col sm:flex-row flex-auto space-x-4">
                    {{ partial('input', ['name' => 'name', 'label' => 'Nom', 'model' => $type]) }}
                </div>
                <div class="w-full flex flex-col sm:flex-row flex-auto space-x-4">
                    <label for="color" class="flex items-center justify-center border rounded-lg pl-2">
                        <span class="px-1 text-sm text-gray-600">Couleur</span>
                        <input id="color" name="color" type="color" class="w-12 h-12 shadow-xl p-0 border-none">
                    </label>
                </div>
            </div>
            <button type="submit" class="w-max btn btn-submit">Valider</button>
        </form>
    </div>

@endsection