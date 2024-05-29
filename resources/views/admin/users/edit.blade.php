<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-900 dark:text-gray-100 leading-tight">
            {{ __('Edytuj użytkownika') }}
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

                    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="formLabel" for="login">
                                Login
                            </label>
                            <input type="text" name="login" id="login" value="{{ old('login', $user->login) }}" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="email">
                                Email
                            </label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="password">
                                Hasło (zostaw puste by zachować obecne)
                            </label>
                            <input type="password" name="password" id="password" class="formField">
                        </div>
                        <div class="mb-4">
                            <label class="formLabel" for="role">
                                Rola
                            </label>
                            <select name="role_id" id="role_id" class="formField">
                                <option value=2 {{ $user->role_id == 2 ? 'selected' : '' }}>Użytkownik</option>
                                <option value=1 {{ $user->role_id == 1 ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="mt-4 flex items-center justify-end">
                            <button onclick="window.location='{{ route('admin.users') }}'" class="inline-flex items-center cancelButton">
                                Anuluj
                            </button>
                            <button type="submit" class="ml-3 inline-flex justify-center uppercase actionButton">
                                Zapisz
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
