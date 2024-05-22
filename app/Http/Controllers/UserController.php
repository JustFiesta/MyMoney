<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

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

            // Fetch unique categories
            $expences = $finances->where('type', 'outcome');

            // Fetch unique categories from expenses
            $categories = $expences->pluck('category')->unique();
            $goals = $user->goals;
            
            // Return view with finances and categories
            return view('home', [
                'categories' => $categories,
                'expences' => $expences,
                'goals' => $goals
            ]);
        } else {
            // Redirect guests
            $user = User::where("role_id", 3)->first(); 
    
            // Fetch user finances
            $finances = $user->finances;
    
            // Fetch expenses and incomes
            $expences = $finances->where('type', 'outcome');
            $incomes = $finances->where('type', 'income');

            // Calculate totals
            $totalExpenses = $expences->sum('amount');
            $totalIncomes = $incomes->sum('amount');
            $balance = $totalIncomes - $totalExpenses;

            // Fetch unique categories from expenses
            $categories = $expences->pluck('category')->unique();
            $goals = $user->goals;
            
            // Return view with finances and categories
            return view('welcome', [
                'incomes' => $incomes,
                'expences' => $expences,
                'categories' => $categories,
                'totalExpenses' => $totalExpenses,
                'totalIncomes' => $totalIncomes,
                'balance' => $balance
            ]);
        }
    }
}
