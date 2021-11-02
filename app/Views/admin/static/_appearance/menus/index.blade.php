@extends('admin.layout')

@section('admin.layouts.main')

    <div class="w-full">
        <div class="controls rounded flex items-center justify-start space-x-2">
            <a class="btn add py-3" href="{{ ADMIN_MENU_ADD }}">Créer un menu</a>
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
            @forelse($menus as $k => $menu)
                <div
                    data-published-date="{{ display_date($menu->created_at, 'Y-m-d') }}"
                    data-updated-date="{{ display_date($menu->updated_at, 'Y-m-d') }}"
                    class="relative p-2 shadow filter hover:brightness-105 mix group" data-box-id="{{ $menu->id }}" data-box-name="{{ $menu->name }}">
                    <div class="py-3">
                        <h1 class="text-black w-full flex flex-row space-x-2 items-center justify-center font-bold text-gray-600 font-arima text-lg">
                            <a href="{{ ADMIN_MENUS }}" class="text-center pt-3">{{ $menu->name }}</a>
                        </h1>
                        <span class="w-full absolute left-0 bottom-0 font-light flex items-center justify-center text-gray-500 text-xs">Modifié le {{ \App\Models\Scuba::formatDateTime($menu->updated_at) }}</span>
                        <div class="absolute top-0 left-0 bg-white w-full grid grid-cols-2 gap-0 text-gray-500">
                            <a href="{{ ADMIN_MENU_EDIT . $menu->id }}" class="flex items-center justify-center p-1.5 shadow-sm group-hover:bg-yellow-200 hover:bg-yellow-200 hover:text-yellow-500" title="Modifier la page">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <a href="#!" class="delete-btn flex items-center justify-center p-1.5 shadow-sm group-hover:bg-red-200 hover:bg-red-200 hover:text-red-500" title="Supprimer la page">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="border-l-2 border-scuba-light shadow px-2 py-4 italic text-gray-500 -ml-4">
                    Vous n'avez pas encore créé de menu.<br>
                    Utilisez le bouton ci-dessus pour créer votre premier menu !
                </p>
            @endforelse
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="gap"></div>
        </div>
    </div>

    {{ partial('delete_box',
        [
            'element' => "h1 a",
            'message' => "Voulez-vous vraiment supprimer le menu",
            'subMessage' => "Si le menu contient des pages, ces dernières seront orphelines (mais ne seront pas supprimées)",
            'callbackUrl' => ADMIN_MENU_DELETE,
        ])
    }}

    {{ partial('alert',
        [
            'content' =>
                "<p>Un menu contient autant de pages que vous le souhaitez !</p>
                <p>Exemple, le menu <span class='text-green-500 font-bold'>Club</span> pourrait contenir les <span class='text-purple-500 font-bold'>pages</span> suivantes :</p>
                <ul class='my-2 space-y-1.5 bg-white p-1.5 rounded border-2 border-blue-200'>
                    <li class='text-green-500 font-bold'>├─ Club</li>
                    <li class='text-purple-500'>├─── Les Activités</li>
                    <li class='text-purple-500'>├─── Les Tarifs</li>
                    <li class='text-purple-500'>├─── Le bateau</li>
                </ul>
                À vous de créer des menus agissant comme des dossiers pour vos différentes pages.",
            'cookie' => "eventTypeEditAlert"
        ])
    }}

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