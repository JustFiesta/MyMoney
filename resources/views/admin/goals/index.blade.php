<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Cele') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alertSuccess">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alertDanger">
            {{ session('error') }}
        </div>
    @endif

    <div class="pt-2 md:pt-6 lg:pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col items-center text-gray-900 dark:text-gray-100">

                    <a href="{{ route('admin.goal.create') }}" class="actionButton mb-3">Dodaj</a>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Ilość oszczędności</th>
                                <th class="px-4 py-2">Opis</th>
                                <th class="px-4 py-2">ID właściciela</th>
                                <th class="px-4 py-2">Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($goals as $goal)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $goal->id }}</td>
                                    <td class="border px-4 py-2">{{ $goal->amount }}</td>
                                    <td class="border px-4 py-2">{{ $goal->content }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $goal->user_id }}</td>
                                    <td class="border px-4 py-2 text-center">
                                        <form action="{{ route('admin.goal.destroy', $goal->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="deleteButton" onclick="return confirm('Jesteś pewien?')">Usuń</button>
                                        </form>
                                        <a href="{{ route('admin.goal.edit', $goal->id) }}" class="editButton">Edytuj</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
