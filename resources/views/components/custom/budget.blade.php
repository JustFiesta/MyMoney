{{-- Fetching categories from provided attributes, from parent view --}}
@php
    $categories = $attributes['categories'];
    $expencesCollection = $attributes['attributes'];

    // $expences = $expencesCollection->pluck('amount');
@endphp
@dd($attributes)
<div {{ $attributes->merge(['type' => 'submit', 'class' => 'pt-2 md:p-6 flex flex-col lg:flex-row justify-between w-full text-center' ]) }}>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Szybki dostęp") }}
        </div>
        <div class="flex flex-col text-gray-600">
            @if (count($categories) > 0)
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
    </div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden w-full lg:w-5/12">
        <div class="p-6 text-gray-600 dark:text-gray-100">
            {{ __("Cele") }}
        </div>
    </div>
</div>