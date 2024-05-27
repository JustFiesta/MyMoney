<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edytuj budżet') }}
        </h2>
    </x-slot>

    <div class="pt-2 md:pt-4 lg:pt-4">
    </div>

    {{-- BUDGET --}}
    @include('budget.view')

    {{-- SUMMARY --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm md:rounded-lg">
            <div class="p-6 text-gray-600 dark:text-gray-100">
                <div class="flex justify-between py-1">
                    <p class="text-lg font-bold">Przychody</p>
                    <span class="income-summary text-xl text-green-600">0 PLN</span>
                </div>
                <div class="flex justify-between py-1">
                    <p class="text-lg font-bold">Wydatki</p>
                    <span class="expense-summary text-xl text-red-600">0 PLN</span>
                </div>
                <div class="flex justify-between py-1">
                    <p class="text-xl font-bold">Bilans: </p>
                    <span class="balance-summary text-2xl font-bold">0 PLN</span>
                </div>
            </div>
        </div>
    </div>
    <script>
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
