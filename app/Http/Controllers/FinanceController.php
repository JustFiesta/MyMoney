<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Finance;

class FinanceController extends Controller
{
    public function index()
    {
        // Get current user
        $user = auth()->user();
    
        // Check if the user is authenticated
        if ($user) {
            // Fetch user finances
            $finances = $user->finances;

            // Fetch expences and incomes
            $expences = $finances->where('type', 'outcome');
            $incomes = $finances->where('type', 'income');
            
            // Return view with finances
            return view('view-budget', [
                'incomes' => $incomes,
                'expences' => $expences,
            ]);
        } else {
            // Redirect guests
            $user = User::where("role_id", 3)->first(); 
    
            // Fetch user finances
            $finances = $user->finances;

            // Fetch expences and incomes
            $expences = $finances->where('type', 'outcome');
            $incomes = $finances->where('type', 'income');
            
            // Return view with finances
            return view('view-budget', [
                'incomes' => $incomes,
                'expences' => $expences,
            ]);
        }
    }

    public function create()
    {
        return view('add-budget');
    }

        public function edit($id)
    {
        $finance = Finance::findOrFail($id);

        return view('edit-budget', compact('finance'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|in:income,outcome',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
        ]);

        $finance = Finance::findOrFail($id);
        $finance->type = $request->type;
        $finance->amount = $request->amount;
        $finance->category = $request->category;
        $finance->save();

        return redirect()->route('view-budget')->with('status', 'Finance updated successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:income,outcome',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
        ]);

        $finance = new Finance;
        $finance->user_id = auth()->id();
        $finance->type = $request->type;
        $finance->amount = $request->amount;
        $finance->category = $request->category;
        $finance->save();

        return redirect()->route('view-budget')->with('status', 'Finance added successfully!');
    }

    public function destroy($id)
    {
        // Find the finance by id and delete it
        $finance = Finance::findOrFail($id);
        $finance->delete();

        // Redirect back to the view budget page with a success message
        return redirect()->route('view-budget')->with('status', 'Finance deleted successfully!');
    }
}
