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
            $expences = Finance::where('user_id', $user->id)
            ->where('type', 'outcome')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

            $incomes = Finance::where('user_id', $user->id)
            ->where('type', 'income')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

            // Fetch unique categories from expenses
            $categories = $finances->pluck('category')->unique();
            
            // Return view with finances
            return view('view-budget', [
                'incomes' => $incomes,
                'expences' => $expences,
                'categories' => $categories
            ]);
        } else {
            return redirect()->route('home');
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

        return redirect()->route('finances');
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

        return redirect()->route('finances');
    }

    public function destroy($id)
    {
        // Find the finance by id and delete it
        $finance = Finance::findOrFail($id);
        $finance->delete();

        // Redirect back to the view budget page with a success message
        return redirect()->route('finances');
    }
}
