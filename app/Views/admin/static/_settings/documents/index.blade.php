@extends('admin.layout')

@section('admin.layouts.main')

    <div class="controls w-full rounded flex items-center justify-start space-x-2">
        <div class="text-white font-arima inline-block h-12 rounded text-lg flex items-center justify-center">
            <span>{!! $title !!}</span>
        </div>
        <div class="h-10 w-0.5 bg-gray-500"></div>
        <a class="btn add py-3" href="{{ ADMIN_DOCUMENT_ADD }}">Ajouter un document</a>
    </div>

    {{ partial('alert',
        [
            'content' => "Plusieurs documents peuvent être requis pour pouvoir s'inscrire aux différents évènements.<br>
                Il y a déjà le <b>CACI</b>, la <b>licence</b> FFESSM, et <b>l'adhésion au club</b>.<br>
                À vous de définir lesquels en les modifiant ou bien en ajoutant des nouveaux !",
            'cookie' => "requiredDocumentsAlert"
        ])
     }}

    <div id="content" class="w-full my-4">
        {{ partial('data_grid',
            [
                'columns' =>
                [
                    'name' => ['label' => 'Nom'],
                    'description' => ['label' => 'Description'],
                    'approval' => [
                        'label' => 'Approbation manuelle',
                        'type' => 'bool',
                        'trueMessage' => "Requise",
                        'falseMessage' => "Non requise"
                    ]
                ],
                'data' => $documents,
                'editLink' => ADMIN_DOCUMENT_EDIT,
                'confirmationBox' =>
                (object) [
                    'show' => true,
                    'callbackUrl' => ADMIN_DOCUMENT_DELETE
                ]
            ])
        }}
    </div>

@endsection