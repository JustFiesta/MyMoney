<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj Cele') }}
        </h2>
    </x-slot>
    
    @include("goals.add")
</x-app-layout>