<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Walidacja danych przesłanych z formularza
        $request->validate([
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5',
            'role' => 'required|string|in:user,admin',
        ]);

        // Sprawdzenie, czy e-mail jest unikalny
        $validator = Validator::make($request->all(), [
            'email' => 'unique:users,email'
        ]);

        // Jeśli e-mail nie jest unikalny, zwróć błąd
        if ($validator->fails()) {
            return back()->withErrors(['email' => 'Konto z takim adresem email już istnieje!'])->withInput();
        }


        // Tworzenie nowego użytkownika na podstawie danych z formularza
        $user = new User();
        $user->login = $request->login;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        // Zapisanie nowego użytkownika do bazy danych
        $user->save();

        // Przekierowanie po dodaniu użytkownika
        return redirect()->route('admin.users.index')->with('success', 'User added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Debugowanie - wyświetl dane żądania
        $user = User::findOrFail($request->id);
        dd($user);

        // Usunięcie pola 'role' z danych wejściowych
        $requestData = $request->except('role');

        $validatedData = Validator::make($requestData, [
            'login' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:5',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $userData = [
            'login' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $hashedPassword = Hash::make($request->input('password'));
            $userData['password'] = $hashedPassword;
        }

        $user->role_id = $request->role_id == 1 ? 1 : 2;

        $user->fill($userData);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try
        {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        }
        catch (\Illuminate\Database\QueryException $e)
        {
            if ($e->getCode() === '23000')
            {
                return redirect()->route('admin.users.index')->with('error', 'Cannot delete user with existing stuff.');
            } 
            else
            {
                return redirect()->route('admin.users.index')->with('error', 'An unexpected error occurred.');
            }
        }
    }
}