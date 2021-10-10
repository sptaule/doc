@extends('admin.layout')

@section('admin.layouts.main')

    <div id="section-action-nav" class="flex space-x-1.5 items-center p-2 rounded bg-gradient-to-r from-gray-50 to-transparent w-full">
        <a class="btn add" href="{{ ADMIN_EVENT_TYPE_ADD }}">Ajouter un type d'évènement</a>
    </div>

    {{ partial('alert',
        [
            'content' =>
                "Les types d'évènement permettent de différencier les évènements entre eux,
                afin de définir des contraintes aux inscriptions, des limitations, des obligations, etc...",
            'cookie' => "eventTypeAlert"
        ])
     }}

    <div id="content" class="w-full">
        {{ partial('data_grid',
            [
                'columns' =>
                [
                    'name' => ['label' => "Nom"]
                ],
                'data' => $types,
                'editLink' => ADMIN_DOCUMENT_EDIT,
                'sortable' => true,
                'confirmationBox' =>
                (object) [
                    'show' => true,
                    'callbackUrl' => ADMIN_DIVING_LEVEL_DELETE
                ]
            ])
        }}
    </div>

@endsection