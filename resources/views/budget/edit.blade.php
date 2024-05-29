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
                <form action="{{ route('finances.update', $finance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="type" class="block formLabel">Rodzaj</label>
                        <select id="type" name="type" class="formField">
                            <option value="income" {{ $finance->type == 'income' ? 'selected' : '' }}>Przychód</option>
                            <option value="outcome" {{ $finance->type == 'outcome' ? 'selected' : '' }}>Wydatek</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="block formLabel">Kwota</label>
                        <input type="number" id="amount" name="amount" step="0.01" class="formField" value="{{ $finance->amount }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block formLabel">Kategoria</label>
                        <input type="text" id="category" name="category" class="formField" value="{{ $finance->category }}" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button onclick="window.history.back()" class="inline-flex items-center cancelButton">
                            Anuluj
                        </button>
                        <button type="submit" class="ml-3 uppercase actionButton">
                            Zapisz
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>