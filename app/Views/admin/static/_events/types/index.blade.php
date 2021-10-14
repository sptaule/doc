@extends('admin.layout')

@section('admin.layouts.main')

    <link rel="stylesheet" href="{{ MIXITUP . 'css' }}">

    {{ partial('alert',
        [
            'content' =>
                "Les types d'évènement permettent de différencier les évènements entre eux,
                afin de définir des contraintes aux inscriptions, des limitations, des obligations, etc...",
            'cookie' => "eventTypeAlert"
        ])
    }}

    <div class="w-full">
        <div class="controls rounded flex items-center justify-start space-x-2">
            <a class="btn add py-3" href="{{ ADMIN_EVENT_TYPE_ADD }}">Créer un type d'évènement</a>
            <div class="h-10 w-0.5 bg-gray-500"></div>
            <div class="flex items-center justify-start rounded" style="background:#444">
                <div class="text-white px-2">Nom</div>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="default:asc" title="Ordre croissant">
                    <i class="fas fa-arrow-alt-up text-base"></i>
                </button>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="default:desc" title="Ordre décroissant">
                    <i class="fas fa-arrow-alt-down text-base"></i>
                </button>
            </div>
        </div>
        <div class="container">
            @foreach($types as $k => $type)
                <div class="relative p-2 shadow filter hover:brightness-105 mix">
                    <div class="pt-5">
                        <h1 class="text-black w-full flex flex-col items-center justify-center font-bold text-gray-600 font-arima text-lg">
                            <span class="text-center" style="color:{{ \App\Models\Scuba::formatColor($type->color) }}">{{ $type->name }}</span>
                        </h1>
                        <div class="absolute top-0 left-0 bg-white w-full grid grid-cols-2 gap-0 text-gray-500">
                            <a href="{{ ADMIN_EVENT_TYPE_EDIT . $type->id }}" class="flex items-center justify-center p-1.5 shadow-sm hover:bg-yellow-200 hover:text-yellow-500" title="Modifier les informations">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <a href="#!" class="flex items-center justify-center p-1.5 shadow-sm hover:bg-red-200 hover:text-red-500" title="Supprimer le type d'évènement">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="gap"></div>
        </div>
    </div>

    <script>
        let containerEl = document.querySelector('.container');
        let mixer = mixitup(containerEl, {
            animation: {
                effects: 'fade scale stagger(60ms)'
            },
            load: {
                filter: 'none'
            }
        });
        containerEl.classList.add('mixitup-ready');
        mixer.show()
            .then(function() {
                mixer.configure({
                    animation: {
                        effects: 'fade scale'
                    }
                });
            });
    </script>

@endsection