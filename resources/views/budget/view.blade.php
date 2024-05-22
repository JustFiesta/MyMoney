<div class="md:pl-6 md:pr-6 md:pb-6 rounded-full flex flex-col lg:flex-row justify-between w-full text-center">
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full pb-6 lg:w-1/2">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
                <h2 class="font-bold text-xl">Przychody</h2>
            </div>
            <a href="{{ route('finances.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">Dodaj</a>
        </div>
        <div class="flex flex-col w-full text-gray-400">
            @if (isset($incomes) && !$incomes->isEmpty())
                <table class="bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="py-2 w-1/4 text-lg font-extrabold underline">Kwota</th>
                            <th class="py-2 w-1/4 text-lg font-extrabold underline">Data</th>
                            <th class="py-2 w-1/4 text-lg font-extrabold underline">Kategoria</th>
                            <th class="py-2 w-1/4 text-lg font-extrabold underline">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incomes as $income)
                            <tr class="expense-row" data-category="{{ $income->category }}">
                                <td class="py-2 text-lg font-semibold">{{ $income->amount }}</td>
                                <td class="py-2 text-lg">{{ $income->created_at->format('d.m.Y') }}</td>
                                <td class="py-2 text-lg">{{ $income->category }}</td>
                                <td class="py-2 text-lg ">
                                    <form action="{{ route('finances.destroy', $income->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Jesteś pewien?')" class="text-red-600 font-bold">Usuń</button>
                                    </form>
                                    <a href="{{ route('finances.edit', $income->id) }}" class="text-blue-600 ml-2 font-bold">Edytuj</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Brak wydatków dla twojego konta.</p>
            @endif
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full pb-6 lg:w-1/2 border-t-2  lg:border-l-2 lg:border-t-0 border-grey-600">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
                <h2 class="font-bold text-xl">Wydatki</h2>
            </div>
            <a href="{{ route('finances.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150">Dodaj</a>
        </div>
        <div class="flex flex-col w-full text-gray-400">
            @if (isset($expences) && !$expences->isEmpty())
                <table class="bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="py-2 w-1/4 text-lg font-extrabold underline">Kwota</th>
                            <th class="py-2 w-1/4 text-lg font-extrabold underline">Data</th>
                            <th class="py-2 w-1/4 text-lg font-extrabold underline">Kategoria</th>
                            <th class="py-2 w-1/4 text-lg font-extrabold underline">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expences as $expence)
                            <tr class="expense-row" data-category="{{ $expence->category }}">
                                <td class="py-2 text-lg font-semibold">{{ $expence->amount }}</td>
                                <td class="py-2 text-lg">{{ $expence->created_at->format('d.m.Y') }}</td>
                                <td class="py-2 text-lg">{{ $expence->category }}</td>
                                <td class="py-2 text-lg ">
                                    <form action="{{ route('finances.destroy', $expence->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Jesteś pewien?')" class="text-red-600 font-bold">Usuń</button>
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
    </div>
</div>
