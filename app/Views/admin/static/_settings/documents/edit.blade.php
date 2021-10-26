@extends('admin.layout')

@section('admin.layouts.main')

    <div class="controls w-full rounded flex items-center justify-start space-x-2">
        <div class="text-white font-arima inline-block h-12 rounded text-lg flex items-center justify-center">
            <span>{!! $title !!}</span>
        </div>
        <div class="h-10 w-0.5 bg-gray-500"></div>
        <a class="btn cancel py-3" href="{{ ADMIN_DOCUMENTS }}">Annuler</a>
    </div>

    <div id="content" class="w-4/6">
        <form action="" method="post" class="space-y-10">
            @php echo csrf_input() @endphp
            <div class="border-l-2 border-green-400 pl-4 w-full">
                <div class="w-full flex flex-col sm:flex-row flex-auto space-x-4">
                    {{ partial('input', ['name' => 'name', 'label' => 'Nom', 'model' => $document]) }}
                </div>
                <div class="w-full">
                    {{ partial('input', ['name' => 'description', 'label' => 'Description (optionnelle)', 'model' => $document]) }}
                </div>
                <div class="w-full">
                    {{ partial('checkbox',
                        ['id' => 'approval',
                        'name' => 'approval',
                        'label' => "Nécessite une approbation manuelle par un administrateur avant d'être valide",
                        'model' => $document])
                    }}
                </div>
            </div>
            <button type="submit" class="w-max btn btn-submit">Valider</button>
        </form>
    </div>

@endsection