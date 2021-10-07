@extends('admin.layout')

@section('admin.layouts.main')

    <div id="section-action-nav" class="flex space-x-1.5 items-center p-2 rounded bg-gradient-to-r from-gray-50 to-transparent w-full">
        <a class="btn add" href="{{ ADMIN_DIVING_LEVELS_ADD }}">Ajouter un niveau de plongée</a>
    </div>

@endsection