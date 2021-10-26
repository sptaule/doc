@extends('admin.layout')

@section('admin.layouts.main')

    <div class="controls w-full rounded flex items-center justify-start space-x-2">
        <div class="text-white font-arima inline-block h-12 rounded text-lg flex items-center justify-center">
            <span>{!! $title !!}</span>
        </div>
        <div class="h-10 w-0.5 bg-gray-500"></div>
        <a class="btn add py-3" href="{{ ADMIN_MENUS }}">Annuler</a>
    </div>

    <div id="content" class="w-4/6">
        <form action="" method="post" class="space-y-10">
            @php echo csrf_input() @endphp
            <div class="border-l-2 border-green-400 pl-4 w-full space-y-4">
                <div class="flex flex-row items-end justify-start space-x-0.5">
                    <div class="flex flex-col sm:flex-row space-x-4">
                        {{ partial('input', ['name' => 'name', 'label' => 'Nom', 'model' => $menu]) }}
                    </div>
                </div>
            </div>
            <button type="submit" class="w-max py-3 mx-4 btn btn-submit">Valider</button>
        </form>
    </div>

@endsection