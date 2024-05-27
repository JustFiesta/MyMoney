<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Edytuj Finanse') }}
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

                    <form action="{{ route('admin.finance.update', $finance->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="formLabel" for="amount">
                                Kwota
                            </label>
                            <input type="number" name="amount" id="amount" value="{{ old('amount', $finance->amount) }}" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="category">
                                Kategoria
                            </label>
                            <textarea name="category" id="category" class="formField">{{ old('category', $finance->category) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="type">
                                Typ
                            </label>
                            <select name="type" id="type" class="formField">
                                <option value="income" {{ old('type', $finance->type) === 'income' ? 'selected' : '' }}>Przychód</option>
                                <option value="outcome" {{ old('type', $finance->type) === 'outcome' ? 'selected' : '' }}>Wydatek</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="user_id">
                                ID użytkownika
                            </label>
                            <input type="number" name="user_id" id="user_id" value="{{ old('user_id', $finance->user_id) }}" class="formField">
                        </div>
                        <div class="mt-4 flex items-center justify-end">
                            <button onclick="window.location='{{ route('admin.finances') }}'" class="inline-flex items-center cancelButton">
                                Anuluj
                            </button>
                            <button type="submit" class="ml-3 inline-flex justify-center uppercase actionButton">
                                Zapisz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
