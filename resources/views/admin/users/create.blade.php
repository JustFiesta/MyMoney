<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Dodaj użytkownika') }}
        </h2>
    </x-slot>

    <div class="pt-2 md:pt-6 lg:pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="formLabel" for="login">
                                Login
                            </label>
                            <input required type="text" name="login" id="login" value="{{ old('login') }}" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="email">
                                Email
                            </label>
                            <input required type="email" name="email" id="email" value="{{ old('email') }}" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="password">
                                Hasło
                            </label>
                            <input type="password" name="password" id="password" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="role">
                                Rola
                            </label>
                            <select required name="role_id" id="role_id" class="formField">
                                <option value="2">Użytkownik</option>
                                <option value="1">Admin</option>
                            </select>
                        <div class="mt-4 flex justify-end">
                            <button onclick="window.location='{{ route('admin.users') }}'" class="inline-flex items-center cancelButton">
                                Anuluj
                            </button>
                            <button type="submit" class="ml-3 uppercase actionButton">
                                Stwórz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
