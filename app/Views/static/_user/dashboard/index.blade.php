@extends('layout', ['mainContentStyle' => 'mx-auto max-w-screen-2xl bg-white rounded-md'])

@section('layouts.main')

    <div class="w-full">

        @component('includes.dashboard')

            @slot('dashboardMain')
                {{ session()->get('user')->firstname }} {{ session()->get('user')->lastname }}
            @endslot

            @slot('dashboardAside')
                @include('helpers.userDashboard.profile')
            @endslot

        @endcomponent

    </div>

@endsection