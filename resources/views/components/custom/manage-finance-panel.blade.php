@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex space-x-8">
        <!-- Categories -->
        <div class="w-1/3 border-r-2 pr-4">
            <h2 class="text-xl font-bold mb-4">Szybki dostęp</h2>
            <div class="flex flex-wrap space-x-2">
                @foreach($categories as $category)
                    <a href="{{ route('finances.filter', ['category' => $category->category]) }}" class="flex items-center justify-center bg-gray-200 rounded-full p-4 w-16 h-16">
                        <span class="text-center text-sm">{{ $category->category }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Spendings in {{ $currentMonthName }} -->
        <div class="w-1/3 border-r-2 px-4">
            <h2 class="text-xl font-bold mb-4">Wydatki w {{ $currentMonthName }}</h2>
            <table class="w-full table-auto mb-4">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Data</th>
                        <th class="border px-4 py-2">Kategoria</th>
                        <th class="border px-4 py-2">Kwota</th>
                        <th class="border px-4 py-2">Typ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($finances as $finance)
                        <tr>
                            <td class="border px-4 py-2">{{ $finance->created_at->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">{{ $finance->category }}</td>
                            <td class="border px-4 py-2
                            {{ $finance->amount }}
                        </td>
                        <td class="border px-4 py-2">{{ $finance->type }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <p><strong>Przychody:</strong> {{ $totalIncome }}</p>
            <p><strong>Wydatki:</strong> {{ $totalOutcome }}</p>
            <p><strong>Różnica:</strong> {{ $balance }}</p>
        </div>
    </div>

    <!-- Goals -->
    <div class="w-1/3 pl-4">
        <h2 class="text-xl font-bold mb-4">Cele</h2>
        <div>
            @foreach($goals as $goal)
                <div class="mb-4">
                    <p><strong>{{ $goal->name }}</strong></p>
                    <p>Uzbierane środki: {{ $goal->current_amount }} / {{ $goal->target_amount }}</p>
                </div>
            @endforeach
        </div>
        <a href="{{ route('goals.edit') }}" class="text-blue-500 hover:underline">Edytuj cele</a>
    </div>
</div>
</div>
@endsection