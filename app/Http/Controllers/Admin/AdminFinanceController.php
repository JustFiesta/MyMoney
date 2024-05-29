<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finance;
use Illuminate\Support\Facades\Auth;

class AdminFinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get current user id
        $loggedInUserId = Auth::id();

        // Get goals from db excluding first admin, current user and anonim
        $finances = Finance::whereNotIn('id', [1, 2, $loggedInUserId])
                    ->get();

        return view('admin.finances.index', compact('finances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.finances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'type' => 'required|in:income,outcome',
            'category' => 'required|string|min:2',
            'user_id' => 'required|exists:users,id'
        ]);

        Finance::create([
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('admin.finances')->with('success', 'Pomyślnie dodano finanse.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finance $finance)
    {
        return view('admin.finances.edit', compact('finance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Finance $finance)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,outcome',
            'category' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]);

        $finance->update([
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('admin.finances')->with('success', 'Pomyślnie zaktualizowano finanse.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finance $finance)
    {
        $finance->delete();
        return redirect()->route('admin.finances')->with('success', 'Pomyślnie usunięto finanse.');
    }
}
