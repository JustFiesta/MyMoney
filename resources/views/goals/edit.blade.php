<div class="pt-2 md:pt-6 lg:pt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('goals.update', $goal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="amount" class="block formLabel">Kwota</label>
                        <input type="number" id="amount" name="amount" class="formField" value="{{ $goal->amount }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block formLabel">Cel</label>
                        <input type="text" id="content" name="content" class="formField" value="{{ $goal->content }}" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button onclick="window.history.back()" class="inline-flex items-center cancelButton">
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