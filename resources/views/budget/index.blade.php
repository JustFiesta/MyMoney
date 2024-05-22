<div class="shadow-sm flex flex-col mx-auto lg:flex-row justify-between max-w-7xl text-center rounded-md">
    <div class="flex flex-col items-center bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12 pb-2">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-xl">Szybki dostęp</h2>
        </div>
        @if (isset($categories) && !$categories->isEmpty())
            <button class="py-4 px-4 mt-2 w-max text-lg rounded-full loginButton font-bold" onclick="filterExpenses('all')">Pokaż wszystko</button>

            <div class="flex flex-wrap justify-center text-gray-400">
                @foreach ($categories as $category)
                    <div class="p-2">
                        <button class="py-4 px-2 text-lg w-full rounded-full bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="filterExpenses('{{ $category }}')">{{ $category }}</button>
                    </div>
                @endforeach
            </div>
            @else
            <div class="flex flex-wrap text-gray-400">
                <p>Brak kategorii dla twojego konta.</p>
            </div>
        @endif
    </div>
    <div class="flex flex-col items-center bg-white dark:bg-gray-800 overflow-hidden w-full pb-2 border-t-2 border-b-2 lg:border-t-0 lg:border-b-0 lg:border-l-2 lg:border-r-2 border-grey-600">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-xl">Wydatki w *miesiąc*</h2>
        </div>
        <div class="flex flex-col w-full text-gray-400">
            @if (isset($expences) && !$expences->isEmpty())
                <table class="bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="py-2 w-1/3 text-lg font-extrabold">Kwota</th>
                            <th class="py-2 w-1/3 text-lg font-extrabold">Data</th>
                            <th class="py-2 w-1/3 text-lg font-extrabold">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expences as $expence)
                            <tr class="expense-row" data-category="{{ $expence->category }}">
                                <td class="py-2 text-lg font-semibold">{{ $expence->amount }}</td>
                                <td class="py-2 text-lg">{{ $expence->created_at->format('d.m.Y') }}</td>
                                <td class="py-2 text-lg ">
                                    <form action="{{ route('finances.destroy', $expence->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 font-bold">Usuń</button>
                                    </form>
                                    <a href="{{ route('finances.edit', $expence->id) }}" class="text-blue-600 ml-2 font-bold">Edytuj</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Brak wydatków dla twojego konta.</p>
            @endif
        </div>
        <div class="summary mt-4 p-4 w-9/12 bg-gray-200 dark:bg-gray-700 rounded-md">
            <p class="font-semibold text-xl text-gray-800 dark:text-gray-200">Podsumowanie:</p>
            <div class="flex justify-between py-1">
                <p class="text-xl text-gray-600 dark:text-gray-400">Wydatki</p>
                <p class="text-xl text-red-600">{{ $totalExpenses }} PLN</p>
            </div>
            <div class="income-summary flex justify-between py-1">
                <p class="text-xl text-gray-600 dark:text-gray-400">Przychody</p>
                <p class="text-xl text-green-600">{{ $totalIncomes }} PLN</p>
            </div>
            <div class="balance-summary flex justify-between py-1">
                <p class="text-xl text-gray-600 dark:text-gray-400">Różnica</p>
                <p class="text-2xl font-bold text-{{ $balance >= 0 ? 'green' : 'red' }}-600">{{ $balance }} PLN</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col items-center bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12 pb-2">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-xl">Cele</h2>
        </div>
        @if (isset($goals) && !$goals->isEmpty())
            <div class="flex flex-wrap text-gray-400">
                <table class="bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="py-2 w-1/3 text-lg font-extrabold">Kwota</th>
                            <th class="py-2 w-1/3 text-lg font-extrabold">Na co oszczędzamy?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($goals as $goal)
                            <tr class="goal-row">
                                <td class="py-2 text-lg font-semibold">{{ $goal->amount }}</td>
                                <td class="py-2 text-lg">{{ $goal->content }}</td>
                                <td class="py-2 text-lg ">
                                    <form action="{{ route('goals.destroy', $goal->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 font-bold">Usuń</button>
                                    </form>
                                    <a href="{{ route('goals.edit', $goal->id) }}" class="text-blue-600 ml-2 font-bold">Edytuj</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="flex flex-wrap text-gray-400">
                <p class="">Brak celów dla twojego konta.</p>
            </div>
        @endif
        <a href="{{ route('goals.add') }}" class="py-4 px-4 mt-2 w-max text-lg rounded-full loginButton font-bold">Dodaj nowy cel!</a>
    </div>
</div>