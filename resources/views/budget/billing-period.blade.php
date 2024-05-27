<div class="py-2 md:py-4 lg:py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex items-center justify-between p-3 md:p-6 lg:p-6 text-black-900 dark:text-gray-300">
                <p>Okres rozliczeniowy: {{ now()->translatedFormat('F') }}</p>
                <form action="{{ route('finances.filterByDate') }}" method="GET" class="flex items-center">
                    <input id="date-picker" name="date_range" class="p-2 border rounded" placeholder="Wybierz datę">
                    <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded">Filtruj</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        flatpickr("#date-picker", {
            mode: "range",
            dateFormat: "Y-m-d",
        });
    });
</script>
