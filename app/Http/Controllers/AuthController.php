<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Property;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('success', 'Logged in successfully');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function home()
    {
        $properties = Property::all()->where('is_deleted', 0);
        return view('home', compact('properties'));
        // return view('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
