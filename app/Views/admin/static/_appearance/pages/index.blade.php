@extends('admin.layout')

@section('admin.layouts.main')

    <div class="w-full">
        <div class="controls rounded flex items-center justify-start space-x-2">
            <a class="btn add py-3" href="{{ ADMIN_PAGE_ADD }}">Créer une page</a>
            <div class="h-10 w-0.5 bg-gray-500"></div>
            <div class="flex items-center justify-start space-x-1">
                <button type="button" class="control rounded bg-white bg-opacity-50 p-2.5" data-filter="all"><span class="text-white">Toutes</span></button>
                <button type="button" class="control rounded bg-white bg-opacity-50 p-2.5" data-filter=".parent"><div class="text-white flex items-center justify-center space-x-1.5"><img src="https://cdn-icons-png.flaticon.com/16/2056/2056831.png" alt=""><span>Parents</span></div></button>
                <button type="button" class="control rounded bg-white bg-opacity-50 p-2.5" data-filter=".child"><div class="text-white flex items-center justify-center space-x-1.5"><img src="https://cdn-icons-png.flaticon.com/16/2948/2948066.png" alt=""><span>Enfants</span></div></button>
            </div>
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
            <div class="h-10 w-0.5 bg-gray-500"></div>
            <div class="flex items-center justify-start rounded" style="background:#444">
                <div class="text-white px-2">Création</div>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="published-date:asc" title="Ordre croissant">
                    <i class="fas fa-arrow-alt-up text-base"></i>
                </button>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="published-date:desc" title="Ordre décroissant">
                    <i class="fas fa-arrow-alt-down text-base"></i>
                </button>
            </div>
            <div class="h-10 w-0.5 bg-gray-500"></div>
            <div class="flex items-center justify-start rounded" style="background:#444">
                <div class="text-white px-2">Mise à jour</div>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="updated-date:asc" title="Ordre croissant">
                    <i class="fas fa-arrow-alt-up text-base"></i>
                </button>
                <button type="button" class="control control-sort flex rounded" style="width: 35px !important;" data-sort="updated-date:desc" title="Ordre décroissant">
                    <i class="fas fa-arrow-alt-down text-base"></i>
                </button>
            </div>
        </div>
        <div class="container">
            @forelse($pages as $k => $page)
                <div
                    data-published-date="{{ display_date($page->created_at, 'Y-m-d') }}"
                    data-updated-date="{{ display_date($page->updated_at, 'Y-m-d') }}"
                    class="relative p-2 shadow filter hover:brightness-105 mix group {{ is_null($page->menu_id) ? 'parent' : '' }} {{ !is_null($page->menu_id) ? 'child' : '' }}" data-box-id="{{ $page->id }}" data-box-name="{{ $page->name }}">
                    <div class="py-3">
                        <h1 class="text-black w-full flex flex-row space-x-0.5 items-center justify-center font-bold text-gray-600 font-arima text-lg">
                            @if(!is_null($page->menu_id))
                                <div class="flex items-center justify-center w-8 h-8 rounded-full" title="La page enfant {{ $page->name }} est rangée dans le menu {{ $page->menu_name }}"><img src="https://cdn-icons-png.flaticon.com/16/2948/2948066.png" alt=""></div>
                            @else
                                <div class="flex items-center justify-center w-8 h-8 rounded-full" title="{{ $page->name }} est une page parente"><img src="https://cdn-icons-png.flaticon.com/16/2056/2056831.png" alt=""></div>
                            @endif
                            <a href="{{ ADMIN_USER_VIEW }}" class="-mt-1.5 text-center pt-3">{{ $page->name }}</a>
                        </h1>
                        <div class="w-full">

                        </div>
                        <div class="absolute top-0 left-0 bg-white w-full grid grid-cols-3 gap-0 text-gray-500">
                            <a href="{{ ADMIN_PAGES }}" class="flex items-center justify-center p-1.5 shadow-sm group-hover:bg-blue-200 hover:bg-blue-200 hover:text-blue-500" title="Voir la page">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </a>
                            <a href="{{ ADMIN_PAGE_EDIT . $page->id }}" class="flex items-center justify-center p-1.5 shadow-sm group-hover:bg-yellow-200 hover:bg-yellow-200 hover:text-yellow-500" title="Modifier la page">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <a href="#!" class="delete-btn flex items-center justify-center p-1.5 shadow-sm group-hover:bg-red-200 hover:bg-red-200 hover:text-red-500" title="Supprimer la page">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="border-l-2 border-scuba-light shadow px-2 py-4 italic text-gray-500">
                    Vous n'avez pas encore créé de page.<br>
                    Utilisez le bouton ci-dessus pour créer votre première page !
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
            'message' => "Voulez-vous vraiment supprimer la page",
            'callbackUrl' => ADMIN_PAGE_DELETE,
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