{{-- CATEGORIES --}}
<div class="mb-2 md:pl-6 md:pr-6 flex flex-col lg:flex-row justify-between w-full text-center">
    <div class="flex flex-col lg:flex-row justify-between items-center md:rounded-lg bg-white dark:bg-gray-800 w-full text-center">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-xl">Szybki dostęp</h2>
        </div>
        @if (isset($categories) && !$categories->isEmpty())
            <button class="py-4 px-4 mt-2 lg:mt-0 w-max text-lg rounded-full loginButton font-bold" onclick="filterExpenses('all')">Pokaż wszystko</button>
    
            <div class="flex flex-wrap justify-center text-gray-400">
                @foreach ($categories as $category)
                    <div class="p-2">
                        <button class="categoryButton" onclick="filterExpenses('{{ $category }}')">{{ $category }}</button>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-wrap text-gray-400">
                <p>Brak kategorii dla twojego konta.</p>
            </div>
        @endif
    </div>
</div>

{{-- EXPENCES --}}
<div class="mb-2 md:pl-6 md:pr-6 md:pb-2 flex flex-col lg:flex-row justify-between w-full text-center">

    {{-- INCOME --}}
    <div class="mb-2 lg:mb-0 bg-white dark:bg-gray-800 md:rounded-lg overflow-hidden w-full pb-6 lg:w-1/2">
        <div class="pb-3 text-gray-600 dark:text-gray-100">
            <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
                <h2 class="font-bold text-xl">Przychody</h2>
            </div>
            <a href="{{ route('finances.create') }}" class="actionButton">Dodaj</a>
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
                            <tr class="expense-row" data-category="{{ $income->category }}" data-type="income">
                                <td class="py-2 text-lg font-semibold amount">{{ $income->amount }}</td>
                                <td class="py-2 text-lg">{{ $income->created_at->format('d.m.Y') }}</td>
                                <td class="py-2 text-lg">{{ $income->category }}</td>
                                <td class="py-2 text-lg ">
                                    <form action="{{ route('finances.destroy', $income->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Jesteś pewien?')" class="deleteButton">Usuń</button>
                                    </form>
                                    <a href="{{ route('finances.edit', $income->id) }}" class="editButton">Edytuj</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Brak przychodów dla twojego konta.</p>
            @endif
        </div>
    </div>

    {{-- OUTCOME --}}
    <div class="bg-white dark:bg-gray-800 overflow-hidden md:rounded-lg w-full pb-6 lg:w-1/2 lg:ml-1">
        <div class="p-3 text-gray-600 dark:text-gray-100">
            <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
                <h2 class="font-bold text-xl">Wydatki</h2>
            </div>
            <a href="{{ route('finances.create') }}" class="actionButton">Dodaj</a>
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
                            <tr class="expense-row" data-category="{{ $expence->category }}" data-type="expense">
                                <td class="py-2 text-lg font-semibold amount">{{ $expence->amount }}</td>
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
