<div class="flex flex-col lg:flex-row justify-between w-full text-center">
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12 pb-2 ">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-l">Szybki dostęp</h2>
        </div>
        <div class="flex flex-col text-gray-400">
            @if (@isset($categories) && !$categories->isEmpty())
                @foreach ($categories as $category)
                    <button>{{ $category }}</button>
                @endforeach
            @else
                <p>Brak kategorii dla twojego konta.</p>
            @endif
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full pb-2 border-t-2 border-b-2 lg:border-t-0 lg:border-b-0 lg:border-l-2 lg:border-r-2 border-grey-600">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-l">Wydatki w *miesiąc*</h2>
        </div>
        <div class="flex flex-col text-gray-400">
            <div class="text-gray-400">
                <div class="flex flex-col items-center text-gray-400">
                    @if (isset($expenses) && !$expenses->isEmpty())
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr>
                                    <th class="py-2 font-extrabold">Kwota</th>
                                    <th class="py-2 font-extrabold">Data</th>
                                    <th class="py-2 font-extrabold">Akcje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                    <tr>
                                        <td class="py-2 font-semibold">{{ $expense->amount }}</td>
                                        <td class="py-2">{{ $expense->created_at }}</td>
                                        <td class="py-2">
                                            <form action="{{ route('finances.destroy', $expense->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 font-semibold">Usuń</button>
                                            </form>
                                            <a href="{{ route('finances.edit', $expense->id) }}" class="text-blue-600 ml-2 font-semibold">Edytuj</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Brak wydatków dla twojego konta.</p>
                    @endif
                    <div class="mt-4 p-4 bg-gray-200 dark:bg-gray-700 rounded-md w-2/3">
                        <p class="font-semibold text-gray-800 dark:text-gray-200">Podsumowanie:</p>
                        <p class="text-gray-600 dark:text-gray-400">Suma wydatków: {{ $totalExpenses }} PLN</p>
                        <p class="text-gray-600 dark:text-gray-400">Suma przychodów: {{ $totalIncomes }} PLN</p>
                        <p class="text-gray-600 dark:text-gray-400">Różnica (przychody - wydatki): {{ $balance }} PLN</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12 pb-2">
        <div class="p-3 lg:p-6 text-gray-600 dark:text-gray-100">
            <h2 class="font-bold text-l">Cele</h2>
        </div>
        <div class="flex flex-col text-gray-400">
            @if (@isset($goals) && !$goals->isEmpty())
                @foreach ($goals as $goal)
                    <p>{{ $goal->amount; }}</p>
                    <p>{{ $goal->content; }}</p>
                @endforeach
                <button>Edytuj cele</button>
            @else
                <p>Brak celów dla twojego konta.</p>
            @endif
        </div>
    </div>
</div>