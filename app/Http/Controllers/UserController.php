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
            $categories = $finances->pluck('category')->unique();
            $expences = $finances->where('type', 'outcome');
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
    
            // Fetch unique categories
            $categories = $finances->pluck('category')->unique();
            $expences = $finances->where('type', 'outcome');
            $goals = $user->goals;
            
            // Return view with finances and categories
            return view('welcome', [
                'categories' => $categories,
                'expences' => $expences,
                'goals' => $goals
            ]);
        }
    }
}
