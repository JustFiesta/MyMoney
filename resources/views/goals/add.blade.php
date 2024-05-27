<div class="pt-2 md:pt-6 lg:pt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('goals.store') }}" method="POST" class="w-full">
                    @csrf
                    <div class="mb-4">
                        <label for="amount" class="block formLabel">Kwota celu</label>
                        <input type="number" name="amount" id="amount" placeholder="Wpisz kwotę" required class="formField">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block formLabel">Treść celu</label>
                        <textarea name="content" id="content" rows="3" placeholder="Opisz cel" required class="formField"></textarea>
                    </div>
                    <div class="flex items-center justify-end">
                        <button onclick="window.history.back()" class="inline-flex items-center cancelButton">
                            Anuluj
                        </button>
                        <button type="submit" class="ml-3 inline-flex justify-center uppercase actionButton">
                            Dodaj cel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>