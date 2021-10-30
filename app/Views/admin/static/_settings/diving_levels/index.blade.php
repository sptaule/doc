@extends('admin.layout')

@section('admin.layouts.main')

    <link rel="stylesheet" href="{{ MIXITUP . 'css' }}">

    <div class="controls w-full rounded flex items-center justify-start space-x-2">
        <div class="text-white font-arima inline-block h-12 rounded text-lg flex items-center justify-center">
            <span>{!! $title !!}</span>
        </div>
        <div class="h-10 w-0.5 bg-gray-500"></div>
        <a class="btn add py-3" href="{{ ADMIN_DIVING_LEVEL_ADD }}">Ajouter un niveau de plongée</a>
    </div>

    {{ partial('alert',
        [
            'content' => "Pour modifier le rang d'un niveau de plongée,
                maintenez la poignée <i class='fas fa-grip-vertical text-xl align-middle rounded bg-white p-1 text-gray-400'></i> à gauche du nom
                et faites la glisser verticalement.",
            'cookie' => "divingLevelsSortAlert"
        ])
     }}

    <div id="content" class="w-full my-4">
        {{ partial('data_grid',
            [
                'columns' =>
                [
                    'name' => ['label' => "Nom"],
                    'position' => ['label' => "Rang"]
                ],
                'data' => $divingLevels,
                'editLink' => ADMIN_DIVING_LEVEL_EDIT,
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