<div class="md:pl-6 md:pr-6 md:pb-2 flex flex-col lg:flex-row justify-between w-full text-center">
    
    {{-- CATEGORIES --}}
    <div class="pb-2 flex flex-col items-center md:rounded-lg bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-xl">Szybki dostęp</h2>
        </div>
        @if (isset($categories) && !$categories->isEmpty())
            <button class="py-4 px-4 mt-2 w-max text-lg rounded-full loginButton font-bold" onclick="filterExpenses('all')">Pokaż wszystko</button>

            <div class="flex flex-wrap justify-center text-gray-400">
                @foreach ($categories as $category)
                    <div class="p-2">
                        <button class="py-4 px-4 text-lg w-full rounded-full bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="filterExpenses('{{ $category }}')">{{ $category }}</button>
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex flex-wrap text-gray-400">
                <p>Brak kategorii dla twojego konta.</p>
            </div>
        @endif
    </div>

    {{-- EXPENSES --}}
    <div class="my-2 lg:my-0 mt-2 ml-0 lg:ml-1 pb-2 flex flex-col items-center bg-white dark:bg-gray-800 overflow-hidden md:rounded-lg w-full lg:w-1/2 border-grey-600">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-xl">Wydatki w {{ now()->translatedFormat('F') }}</h2>
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
                                <td class="py-2 text-lg">
                                    <form action="" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Jesteś pewien?')" class="text-red-600 font-bold">Usuń</button>
                                    </form>
                                    <a href="" class="text-blue-600 ml-2 font-bold">Edytuj</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>Brak wydatków dla twojego konta.</p>
            @endif
        </div>
        
        {{-- SUMMARY --}}
        <div class="summary mt-4 w-9/12 md:rounded-lg">
            <div class="bg-gray-50 dark:bg-gray-700 overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-600 dark:text-gray-100">
                    <div class="flex justify-between py-1">
                        <p class="text-xl font-bold">Wydatki </p>
                        <span class="balance-summary text-xl font-bold text-red-600">0 PLN</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- GOALS --}}
    <div class="ml-0 lg:ml-1 flex flex-col items-center pb-2 md:rounded-lg bg-white dark:bg-gray-800 overflow-hidden">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-xl">Cele</h2>
        </div>
        @if (isset($goals) && !$goals->isEmpty())
            <div class="flex flex-col w-full text-gray-400">
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
                                <td class="py-2 text-lg">
                                    <form action="', $goal->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Jesteś pewien?')" class="text-red-600 font-bold">Usuń</button>
                                    </form>
                                    <a href="" class="text-blue-600 ml-2 font-bold">Edytuj</a>
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
        <a href="" class="py-4 px-4 mt-2 w-max text-lg rounded-full loginButton font-bold">Dodaj nowy cel!</a>
    </div>
</div>
