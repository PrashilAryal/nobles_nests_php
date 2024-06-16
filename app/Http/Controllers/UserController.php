<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Fetches all users and displays them in a view (users.index)
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Displays the form to create a new user (users.create)
    public function create()
    {
        return view('layouts/userRegister');
    }

    // Validates the form data and creates a new user
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'type' => 'required|in:buyer,seller',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = new User([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'type' => $request->input('type'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->save();

        // return redirect()->route('users.index')->with('success', 'User created successfully');
        return redirect()->route('register')->with('success', 'User registered successfully');
    }

    // Displays the form to edit an existing user (users.edit)
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Validates the form data and updates the user information
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'type' => 'required|in:buyer,seller',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'type' => $request->input('type'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'password' => $request->filled('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    // Deletes a user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
