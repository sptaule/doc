@extends('admin.layout')

@section('admin.layouts.main')

    {{ partial('alert',
        [
            'content' =>
                "Définissez les contraintes pour les types d'évènement !<br>
                <p>Prenons l'exemple d'un <u>évènement repas</u> :</p>
                <ul class='my-2 space-y-1.5 bg-white p-1.5 rounded border-2 border-blue-200'>
                    <li>- Le membre <b>ne sera pas décrédité</b> lors de son inscription à un évènement <b>repas</b>.</li>
                    <li>- Seulement <b>l'adhésion au club</b> est demandée lors de l'inscription.</li>
                    <li>- Tout le monde est autorisé à y participer.</li>
                </ul>
                À vous de les modifier à votre guise.",
            'cookie' => "eventTypeEditAlert"
        ])
    }}

    <div class="controls w-full rounded flex items-center justify-start space-x-2">
        <div class="text-white font-arima inline-block h-12 rounded text-lg flex items-center justify-center">
            <span>{!! $title !!}</span>
        </div>
        <div class="h-10 w-0.5 bg-gray-500"></div>
        <a class="btn cancel py-3" href="{{ ADMIN_EVENT_TYPES }}">Annuler</a>
    </div>

    <div id="content" class="w-4/6">
        <form action="" method="post" class="space-y-10">
            @php echo csrf_input() @endphp
            <div class="border-l-2 border-green-400 pl-4 w-full space-y-4">
                <p class="text-gray-500 italic">Informations générales</p>
                <div class="flex flex-row items-end justify-start space-x-0.5">
                    <div class="flex flex-col sm:flex-row space-x-4">
                        {{ partial('input', ['name' => 'name', 'label' => 'Nom', 'model' => $type]) }}
                    </div>
                    <div class="flex flex-col sm:flex-row space-x-4">
                        {{ partial('color', ['value' => \App\Models\Scuba::formatColor($type->color)]) }}
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row space-x-4">
                    <div class="bg-teal-50 shadow-md p-2 flex flex-col items-start justify-center">
                        {{ partial('checkbox', [
                            'id' => 'charge',
                            'name' => 'charge',
                            'label' => "L'inscription à un évènement de ce type est payante",
                            'subLabel' =>
                                "Si oui, l'utilisateur sera décrédité de <b class='bg-blue-100 p-1 rounded-lg'>1</b>
                                lors d'une inscription à un évènement de type $type->name<br>
                                Si non, l'inscription ne coûtera aucun crédit à l'utilisateur.",
                            'state' => $type->charge == 1 ? 'checked' : ''])
                        }}
                    </div>
                </div>
            </div>
            <div class="border-l-2 border-green-400 pl-4 w-full space-y-4">
                <p class="text-gray-500 italic">Documents requis</p>
                <p class="text-gray-500 text-sm italic">
                    Cochez tous les documents que l'utilisateur <u>doit posséder</u> pour pouvoir s'inscrire à un évènement de type
                    <b class="bg-gray-100 p-1 rounded-lg shadow" style="color:{{ \App\Models\Scuba::formatColor($type->color) }}">{{ $type->name }}</b>
                    <br>Par défaut, tous les documents sont requis.
                </p>
                <div class="grid grid-cols-3 gap-3">
                    @foreach($documents as $k => $document)
                        <div class="bg-teal-50 shadow-md p-2 flex flex-col items-start justify-center">
                            {{ partial('checkbox', [
                                'id' => "documents[$document->id]",
                                'name' => "documents[$document->id]",
                                'label' => $document->name,
                                'state' => $typeDocuments[$document->id]->value == 1 ? 'checked' : ''])
                            }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="border-l-2 border-green-400 pl-4 w-full space-y-4">
                <p class="text-gray-500 italic">Grades autorisés</p>
                <p class="text-gray-500 text-sm italic">
                    Cochez tous les grades autorisés à participer à un évènement de type
                    <b class="bg-gray-100 p-1 rounded-lg shadow" style="color:{{ \App\Models\Scuba::formatColor($type->color) }}">{{ $type->name }}</b>
                    <br>Par défaut, tous les grades sont autorisés.
                </p>
                <div class="grid grid-cols-3 gap-3">
                    @foreach($ranks as $k => $rank)
                        <div class="bg-teal-50 shadow-md p-2 flex flex-col items-start justify-center">
                            {{ partial('checkbox', [
                                'id' => "ranks[$rank->rank_id]",
                                'name' => "ranks[$rank->rank_id]",
                                'label' => $rank->rank_name,
                                'labelColor' => \App\Models\Scuba::formatColor($rank->rank_color),
                                'state' => $typeRanks[$rank->rank_id]->value == 1 ? 'checked' : ''])
                            }}
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="w-max py-3 mx-4 btn btn-submit">Valider</button>
        </form>
    </div>

@endsection