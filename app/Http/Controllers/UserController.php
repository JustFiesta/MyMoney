<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

            // Return view with finances and categories
            // return view('components.custom.budget', [
            return view('home', [
                'categories' => $categories,
                'expences' => $expences
            ]);
        } else {
            // Redirect guests
            return redirect()->route('login');
        }
    }
}
