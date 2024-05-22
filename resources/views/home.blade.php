<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Cześć') }}, {{ Auth::user()->login }}
        </h2>
    </x-slot>

    <div class="py-2 md:py-4 lg:py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between p-3 md:p-6 lg:p-6 text-black-900 dark:text-gray-300">
                    <p>Okres rozliczeniowy: {{ __('*miesiąc*') }}</p>
                    ikona kalendarza
                </div>
            </div>
        </div>
    </div>
    @include('budget.index')

    <script>
        // Apply filters for category buttons and hide summary
        function filterExpenses(category) {
            const rows = document.querySelectorAll('.expense-row');
            const summary = document.querySelector('.summary');
            const incomeSummary = document.querySelector('.income-summary');
            const balanceSummary = document.querySelector('.balance-summary');

            rows.forEach(row => {
                if (category === 'all' || row.dataset.category === category) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            if (category === 'all') {
                summary.style.display = '';
                incomeSummary.style.display = '';
                balanceSummary.style.display = '';
            } else {
                summary.style.display = 'none';
                incomeSummary.style.display = 'none';
                balanceSummary.style.display = 'none';
            }
        }

        // Add listener for scroll position change
        document.addEventListener('DOMContentLoaded', function () {
            
            // Load previous scrolll position
            if (localStorage.getItem('scrollPosition')) {
                window.scrollTo(0, localStorage.getItem('scrollPosition'));
                localStorage.removeItem('scrollPosition');
            }

            // Save scroll position
            const editLinks = document.querySelectorAll('.edit-link');
            editLinks.forEach(link => {
                link.addEventListener('click', function () {
                    localStorage.setItem('scrollPosition', window.scrollY);
                });
            });
        });
    </script>
</x-app-layout>