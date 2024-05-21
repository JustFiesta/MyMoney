<div class="pt-2 md:p-6 flex flex-col lg:flex-row justify-between w-full text-center">
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Szybki dostęp") }}
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
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:border-l-2 lg:border-r-2 border-grey-600">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Wydatki w *miesiąc*") }}
        </div>
        <div class="flex flex-col text-gray-400">
            @if (@isset($expences) && !$expences->isEmpty())
                @foreach ($expences as $expence)
                    <p>{{ $expence->amount; }}</p>
                    <p>{{ $expence->created_at; }}</p>
                @endforeach
            @else
                <p>Brak wydatków dla twojego konta.</p>
            @endif
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Cele") }}
        </div>
        <div class="flex flex-col text-gray-400">
            @if (@isset($goals) && !$goals->isEmpty())
                @foreach ($goals as $goal)
                    <p>{{ $goal->amount; }}</p>
                    <p>{{ $goal->content; }}</p>
                @endforeach
                <button>Edytuj cele</button>
            @else
                <p>Brak wydatków dla twojego konta.</p>
            @endif
        </div>
    </div>
</div>