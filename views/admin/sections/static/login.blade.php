@extends('admin.guest_layout')

<div class="flex items-center min-h-screen p-6 bg-indigo-100 w-screen">
    <div
            class="flex-1 h-auto max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl"
    >
        <form class="flex flex-col overflow-y-auto md:flex-row" method="POST">

            @php
                echo csrf_input();
            @endphp

            <div class="block h-32 md:h-auto md:w-1/2">
                <img
                    aria-hidden="true"
                    class="object-contain w-full h-full p-12 select-none"
                    src="{{ LOGO_FULL }}"
                    alt=""
                />
            </div>

            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">

                    {{ partial('input', ['name' => "email", 'label' => "Email"]) }}

                    {{ partial('input', ['name' => "password", 'label' => "Mot de passe", 'type' => 'password']) }}

                    <button class="btn btn-submit" type="submit">Connexion</button>

                </div>
            </div>
        </form>
    </div>
</div>
