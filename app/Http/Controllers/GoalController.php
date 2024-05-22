<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Goal;

class GoalController extends Controller
{
    /**
     * Redirect to add goal form.
     */
    public function create()
    {
        return view('add-goal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate inputs
        $request->validate([
            'amount' => 'required|numeric',
            'content' => 'required|string|max:255',
        ]);

        // Create new goal
        $goal = new Goal();
        $goal->amount = $request->input('amount');
        $goal->content = $request->input('content');
        $goal->user_id = auth()->id();

        // Save
        $goal->save();

        // Redirect
        return redirect()->route('home')->with('success', 'Cel został dodany pomyślnie!');
    }

    /**
     * Remove resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the finance by id and delete it
        $goal = Goal::findOrFail($id);
        $goal->delete();

        // Redirect back to the view budget page with a success message
        return redirect()->route('home')->with('status', 'Goal deleted successfully!');
    }
}
