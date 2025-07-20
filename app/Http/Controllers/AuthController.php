<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Assuming you have a User model

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if(!$user){
            return redirect()->back()->withErrors(['email' => 'No user found with this email.']);
        }
        if(!Hash::check($request->password, $user->password)){
            return redirect()->back()->withErrors(['password' => 'Incorrect password.']);
        }
        Auth::login($user);
        return redirect()->route('posts.index')->with('success', 'Logged in successfully.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Logged out successfully');
    }
}
