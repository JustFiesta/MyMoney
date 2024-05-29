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
                <form action="{{ route('finances.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="type" class="formLabel">Rodzaj</label>
                        <select id="type" name="type" class="formField">
                            <option value="income">Przychód</option>
                            <option value="outcome">Wydatek</option>
                        </select>
                        @error('type')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="formLabel">Kwota</label>
                        <input type="number" id="amount" name="amount" step="0.01" min="0.01" class="mt-1 block w-full pl-3 pr-3 py-2 border border-gray-300 dark:border-gray-600 bg-inherit rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="formLabel">Kategoria</label>
                        <input type="text" id="category" name="category" class="mt-1 block w-full pl-3 pr-3 py-2 border border-gray-300 dark:border-gray-600 bg-inherit rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        @error('category')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-center justify-end">
                        <button onclick="window.history.back()" class="inline-flex items-center cancelButton">
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