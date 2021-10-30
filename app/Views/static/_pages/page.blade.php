@extends('layout')

@section('layouts.main')

    <div class="flex space-x-4 items-center text-3xl font-arima text-scuba-dark text-shadow-md">

        @if($page->deletable == 1)
            <i class="far fa-circle text-sm"></i>
        @endif

        @if(isset($menu))
            <span class="mt-1 text-shadow-none text-gray-700">{{ $menu->name }}</span>
            <i class="fas fa-caret-right text-lg"></i>
        @endif

        <h1 class="mt-1 text-4xl">{{ $page->deletable == 1 ? $page->name : '' }}</h1>
    </div>

    <div class="{{ $page->deletable == 1 ? 'my-12' : 'my-3' }} text-lg" id="page-content">
        {!! $page->content !!}
    </div>

    <style>
        #page-content p {
            padding: 7px 0;
        }
        #page-content h1, #page-content h2, #page-content h3, #page-content h4, #page-content h5, #page-content h6 {
            font-family: 'Arima Madurai', sans-serif;
            margin-top: 10px;
        }
        #page-content h1 {
            font-size: 1.75em;
        }
        #page-content h2 {
            font-size: 1.5em;
        }
        #page-content h3 {
            font-size: 1.25em;
        }
        #page-content h4 {
            font-size: 1em;
        }
        #page-content a {
            color: #0897c4;
            font-weight: bold;
            border-bottom: 2px solid #0D8CF0;
        }
        #page-content a:hover {
            color: #05b76f;
            border-bottom: 2px solid #05b76f;
        }
        #page-content iframe {
            width: 100% !important;
            height: 350px !important;
        }
    </style>

@endsection