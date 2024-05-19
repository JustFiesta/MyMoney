<div {{ $attributes->merge(['type' => 'submit', 'class' => 'pt-2 md:p-6 flex flex-col lg:flex-row justify-between w-full text-center' ]) }}>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Szybki dostęp") }}
            {{-- @isset($categories)
                @if (count($categories) > 0)
                    <h2>Wyniki wyszukiwania</h2>
                    <ul>
                    @foreach ($categories as $category)
                        <li>
                        {{ $category }}
                        </li>
                    @endforeach
                    </ul>
                @else
                    <p>Brak wyników wyszukiwania.</p>
                @endif
            @endisset
            @foreach($categories as $category)
                <p>{{ $category }}</p>
            @endforeach --}}
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:border-l-2 lg:border-r-2 border-grey-600">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Wydatki w *miesiąc*") }}
        </div>
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Cele") }}
        </div>
    </div>
</div>