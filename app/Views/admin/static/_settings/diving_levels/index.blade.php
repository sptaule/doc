@extends('admin.layout')

@section('admin.layouts.main')

    <div id="section-action-nav" class="flex space-x-1.5 items-center p-2 rounded bg-gradient-to-r from-gray-50 to-transparent w-full">
        <a class="btn add" href="{{ ADMIN_DIVING_LEVEL_ADD }}">Ajouter un niveau de plongée</a>
    </div>

    {{ partial('alert',
        [
            'content' => "Pour modifier le rang d'un niveau de plongée,
                maintenez la poignée <i class='fas fa-grip-vertical text-xl align-middle rounded bg-white p-1 text-gray-400'></i> à gauche du nom
                et faites la glisser verticalement.",
            'cookie' => "divingLevelsSortAlert"
        ])
     }}

    <div id="content" class="w-full">
        {{ partial('data_grid',
            ['columns' =>
                [
                    'name' => 'Nom',
                    'position' => 'Rang'
                ],
            'data' => $divingLevels,
            'sortable' => true
            ])
        }}
    </div>

@endsection