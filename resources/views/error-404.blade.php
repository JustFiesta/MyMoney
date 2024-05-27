@if (Route::has('login'))
    @auth()
        <x-app-layout>
            @include('error.not-found')
        </x-app-layout>
@else
        @include('welcome')
    @endauth
@endif