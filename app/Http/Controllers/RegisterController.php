<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validate and create user logic here
        // Example:
        // $request->validate([...]);
        // User::create([...]);
        return redirect()->route('register.show')->with('success', 'Registration successful!');
    }
}
