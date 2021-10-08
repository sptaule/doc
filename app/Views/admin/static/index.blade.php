@extends('admin.layout')

@section('admin.layouts.main')
    <form action="" method="post">
        @php echo csrf_input() @endphp
        {{ partial('input', ['name' => 'firstname', 'label' => "Prénom"]) }}
        {{ partial('input', ['name' => 'lastname', 'label' => "Nom"]) }}
        <button type="submit" class="px-4 py-1 bg-scuba-green text-white font-bold">Valider</button>
    </form>
@endsection