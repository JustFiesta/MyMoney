<div class="pt-2 md:p-6 rounded-full flex flex-col lg:flex-row justify-between w-full text-center">
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full pb-6 lg:w-1/2">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Przychody") }}
            <a href="{{ route('finances.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Dodaj</a>
        </div>
        <div class="flex flex-col text-gray-400">
            @if (isset($incomes) && !$incomes->isEmpty())
                @foreach ($incomes as $income)
                    <div>
                        <p>{{ $income->amount }}</p>
                        <p>{{ $income->created_at }}</p>
                        <form action="{{ route('finances.destroy', $income->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Jesteś pewien?')">Usuń</button>
                        </form>
                        <a href="{{ route('finances.edit', $income->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edytuj</a>
                    </div>
                @endforeach
            @else
                <p>Brak przychodów dla twojego konta.</p>
            @endif

        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full pb-6 lg:w-1/2 border-t-2  lg:border-l-2 lg:border-t-0 border-grey-600">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Wydatki") }}
            <a href="{{ route('finances.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Dodaj</a>
        </div>
        <div class="flex flex-col text-gray-400">
            @if (isset($expences) && !$expences->isEmpty())
                @foreach ($expences as $expence)
                    <div>
                        <p>{{ $expence->amount }}</p>
                        <p>{{ $expence->created_at }}</p>
                        <form action="{{ route('finances.destroy', $expence->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Usuń</button>
                        </form>
                        <a href="{{ route('finances.edit', $expence->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edytuj</a>
                    </div>
                @endforeach
            @else
                <p>Brak wydatków dla twojego konta.</p>
            @endif
        </div>
    </div>
</div>
