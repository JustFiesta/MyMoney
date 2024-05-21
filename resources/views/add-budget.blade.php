<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dodaj finanse') }}
        </h2>
    </x-slot>

    @include("budget.add")
</x-app-layout>
