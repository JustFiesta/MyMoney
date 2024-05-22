<div class="pt-2 md:pt-6 lg:pt-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form action="{{ route('goals.update', $goal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kwota</label>
                        <input type="number" id="amount" name="amount" class="mt-1 block w-full pl-3 pr-3 py-2 border border-gray-300 dark:border-gray-600 bg-inherit rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $goal->amount }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cel</label>
                        <input type="text" id="content" name="content" class="mt-1 block w-full pl-3 pr-3 py-2 border border-gray-300 dark:border-gray-600 bg-inherit rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $goal->content }}" required>
                    </div>
                    <div class="flex items-center justify-end">
                        <button onclick="window.history.back()" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Anuluj
                        </button>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white uppercase bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">
                            Zapisz
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>