<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $goals = Goal::all();
        return view('admin.goals.index', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $userExists = User::where('id', $request->user_id)->exists();

        if (!$userExists) {
            return redirect()->back()->with('error', 'Użytkownik o podanym ID nie istnieje.');
        }

        $request->validate([
            'amount' => 'required|numeric',
            'content' => 'nullable|string',
            'user_id' => 'required|exists:users,id'
        ], [
            'user_id.exists' => 'Nie znaleziono użytkownika o podanym ID.'
        ]);

        Goal::create([
            'amount' => $request->amount,
            'content' => $request->content,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('admin.goals')->with('success', 'Pomyślnie dodano cel.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        return view('admin.goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goal $goal)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'content' => 'nullable|string',
        ]);

        $goal->update([
            'amount' => $request->amount,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.goals')->with('success', 'Pomyślnie zaktualizowano cel.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('admin.goals')->with('success', 'Pomyślnie usunięto cel.');
    }
}
