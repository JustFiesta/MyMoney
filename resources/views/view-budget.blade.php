<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edytuj budżet') }}
        </h2>
    </x-slot>

    <div>
        @if (session('status'))
            <div class="max-w-7xl mx-auto pt-2 lg:pt-4">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-green-500 text-white p-4 rounded-lg">
                            {{ session('status') }}
                        </div>
                </div>
            </div>
        @endif

        @include('budget.view')
    </div>
</x-app-layout>
