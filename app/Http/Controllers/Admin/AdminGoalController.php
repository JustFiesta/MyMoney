<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminGoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get current user id
        $loggedInUserId = Auth::id();

        // Get goals from db excluding first admin, current user and anonim
        $goals = Goal::whereNotIn('id', [1, 2, $loggedInUserId])
                 ->get();

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
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'content' => 'nullable|string|min:2',
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
            'amount' => 'required|numeric|min:0.01',
            'content' => 'nullable|string|min:2',
            'user_id' => 'required|exists:users,id'
        ], [
            'user_id.exists' => 'Nie znaleziono użytkownika o podanym ID.'
        ]);

        $goal->update([
            'amount' => $request->amount,
            'content' => $request->content,
            'user_id' => $request->user_id
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
