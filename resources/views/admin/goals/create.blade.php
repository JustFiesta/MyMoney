<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Dodaj Cel') }}
        </h2>
    </x-slot>

    <div class="pt-2 md:pt-6 lg:pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.goal.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="formLabel" for="amount">
                                Kwota
                            </label>
                            <input type="number" name="amount" id="amount" value="{{ old('amount') }}" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="content">
                                Opis
                            </label>
                            <textarea name="content" id="content" class="formField">{{ old('content') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="content">
                                ID właściciela
                            </label>
                            <input type="number" name="user_id" id="user_id" value="{{ old('user_id') }}" class="formField">
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button onclick="window.location='{{ route('admin.goals') }}'" class="inline-flex items-center cancelButton">
                                Anuluj
                            </button>
                            <button type="submit" class="ml-3 uppercase actionButton">
                                Dodaj
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>