<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Finance;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get current user
        $user = auth()->user();
    
        // Check if the user is authenticated
        if ($user) {
            // Fetch user finances
            $finances = $user->finances;

            // Fetch user goals
            $goals = $user->goals;

            // Fetch expenses and incomes
            $expences = Finance::where('user_id', $user->id)
            ->where('type', 'outcome')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
            
            $incomes = $finances->where('type', 'income');

            // Calculate totals
            $totalExpenses = $expences->sum('amount');
            $totalIncomes = $incomes->sum('amount');
            $balance = $totalIncomes - $totalExpenses;

            // Fetch unique categories from expenses
            $categories = $expences->pluck('category')->unique();
            
            // Return view with finances and categories
            return view('home', [
                'incomes' => $incomes,
                'expences' => $expences,
                'categories' => $categories,
                'goals' => $goals,
                'totalExpenses' => $totalExpenses,
                'totalIncomes' => $totalIncomes,
                'balance' => $balance
            ]);
        } else {
            // Redirect guests
            $user = User::where("role_id", 3)->first(); 
    
            // Fetch user finances
            $finances = $user->finances;

            // Fetch user goals
            $goals = $user->goals;
    
            // Fetch expenses and incomes
            $expences = $finances->where('type', 'outcome');
            $incomes = $finances->where('type', 'income');

            // Calculate totals
            $totalExpenses = $expences->sum('amount');
            $totalIncomes = $incomes->sum('amount');
            $balance = $totalIncomes - $totalExpenses;

            // Fetch unique categories from expenses
            $categories = $expences->pluck('category')->unique();
            
            // Return view with finances and categories
            return view('welcome', [
                'incomes' => $incomes,
                'expences' => $expences,
                'categories' => $categories,
                'goals' => $goals,
                'totalExpenses' => $totalExpenses,
                'totalIncomes' => $totalIncomes,
                'balance' => $balance
            ]);
        }
    }
}
