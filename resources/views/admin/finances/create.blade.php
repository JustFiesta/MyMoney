<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Dodaj Finanse') }}
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

                    <form action="{{ route('admin.finance.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="formLabel" for="amount">
                                Kwota
                            </label>
                            <input required type="number" name="amount" id="amount" step="0.01" min="0.01" value="{{ old('amount') }}" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="type">
                                Typ
                            </label>
                            <select required name="type" id="type" class="formField">
                                <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>Przychód</option>
                                <option value="outcome" {{ old('type') == 'outcome' ? 'selected' : '' }}>Wydatek</option>
                            </select>
                            @error('type')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label class="formLabel" for="category">
                                Kategoria
                            </label>
                            <textarea required name="category" id="category" class="formField">{{ old('category') }}</textarea>
                            @error('category')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="user_id">
                                ID właściciela
                            </label>
                            <input required type="number" name="user_id" id="user_id" value="{{ old('user_id') }}" class="formField">
                            @error('user_id')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4 flex justify-end">
                            <button type="button" onclick="window.location='{{ route('admin.finances') }}'" class="inline-flex items-center cancelButton">
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
