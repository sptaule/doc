@extends('admin.layout')

@section('admin.layouts.main')

    <div id="section-action-nav" class="flex space-x-1.5 items-center p-2 rounded bg-gradient-to-r from-gray-50 to-transparent w-full">
        <a class="btn add" href="{{ ADMIN_DOCUMENT_ADD }}">Ajouter un document</a>
    </div>

    {{ partial('alert',
        [
            'content' => "Plusieurs documents peuvent être requis pour pouvoir s'inscrire aux différents évènements.<br>
                Il y a déjà le <b>CACI</b>, la <b>licence</b> FFESSM, et <b>l'adhésion au club</b>.<br>
                À vous de définir lesquels en les modifiant ou bien en ajoutant des nouveaux !",
            'cookie' => "requiredDocumentsAlert"
        ])
     }}

    <div id="content" class="w-full">
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