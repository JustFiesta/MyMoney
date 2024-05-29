<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Edytuj Cel') }}
        </h2>
    </x-slot>

    <div class="pt-2 md:pt-6 lg:pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="alert alert-danger bg-red-500 text-white p-4 rounded mb-4">
                            <strong>Ups! Coś poszło nie tak.</strong>
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.goal.update', $goal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="formLabel" for="amount">
                                Kwota
                            </label>
                            <input required type="number" name="amount" id="amount" step="0.01" min="0.01" value="{{ old('amount', $goal->amount) }}" class="formField">
                            @error('amount')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="content">
                                Opis
                            </label>
                            <textarea required name="content" id="content" class="formField">{{ old('content', $goal->content) }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="user_id">
                                ID użytkownika
                            </label>
                            <input required type="number" name="user_id" id="user_id" value="{{ old('user_id', $goal->user_id) }}" class="formField">
                            @error('user_id')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4 flex items-center justify-end">
                            <button type="button" onclick="window.location='{{ route('admin.goals') }}'" class="inline-flex items-center cancelButton">
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
