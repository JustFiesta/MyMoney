<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Cześć') }}, {{ Auth::user()->login }}, tutaj są twoje ostatnie wydatki.
        </h2>
    </x-slot>

    <div class="py-2 md:py-4 lg:py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between p-3 md:p-6 lg:p-6 text-black-900 dark:text-gray-300">
                    <p>Okres rozliczeniowy: {{ now()->translatedFormat('F') }}</p>
                    ikona kalendarza
                </div>
            </div>
        </div>
    </div>
    
    @include('budget.index')

    {{-- HIDDEN FOR CALCULATIONS AND PUSH TO BUDGET.INDEX --}}
    <div class="hidden">
        <div>
            <div>
                <p>Income sum: <span class="income-summary">0</span> zł</p>
                <p>Expence sum: <span class="expense-summary">0</span> zł</p>
                <p>Bilance: <span class="balance-summary">0</span> zł</p>
            </div>
        </div>
    </div>

    <script>
        // Apply filters for category buttons and hide summary
        function filterExpenses(category) {
            const rows = document.querySelectorAll('.expense-row');

            rows.forEach(row => {
                if (category === 'all' || row.dataset.category === category) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            updateTotals();
        }

        function updateTotals() {
            let totalIncome = 0;
            let totalExpense = 0;

            document.querySelectorAll('.expense-row').forEach(row => {
                if (row.style.display !== 'none') {
                    const amount = parseFloat(row.querySelector('.amount').textContent);
                    if (row.dataset.type === 'income') {
                        totalIncome += amount;
                    } else if (row.dataset.type === 'expense') {
                        totalExpense += amount;
                    }
                }
            });

            document.querySelector('.income-summary').textContent = totalIncome.toFixed(2);
            document.querySelector('.expense-summary').textContent = totalExpense.toFixed(2);
            document.querySelector('.balance-summary').textContent = (totalIncome - totalExpense).toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', () => {
            updateTotals();
        });
    </script>
</x-app-layout>
