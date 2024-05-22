<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edytuj budżet') }}
        </h2>
    </x-slot>

    <div class="py-2 md:py-4 lg:py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between p-3 md:p-6 lg:p-6 text-black-900 dark:text-gray-300">
                    <p>Okres rozliczeniowy: {{ now()->translatedFormat('F') }}</p>
                    ikona kalendarza
                </div>
            </div>
        </div>
    </div>

    <div>
        @if (session('status'))
            <div class="max-w-7xl mx-auto">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-green-500 text-white p-4 rounded-lg">
                            {{ session('status') }}
                        </div>
                </div>
            </div>
        @endif
    </div>

    @include('budget.view')

</x-app-layout>
