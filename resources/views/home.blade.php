<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Cześć') }}, {{ Auth::user()->login }}
        </h2>
    </x-slot>

    <div class="pt-2 md:pt-6 lg:pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between p-3 md:p-6 lg:p-6 text-black-900 dark:text-gray-300">
                    <p>Okres rozliczeniowy: {{ __('*miesiąc*') }}</p>
                    ikona kalendarza
                </div>
            </div>
        </div>
    </div>

    <x-custom.budget :categories="$categories" :expences="$expences" />
</x-app-layout>