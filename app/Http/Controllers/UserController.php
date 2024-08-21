<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // Fetches all users and displays them in a view (users.index)
    public function index()
    {
        $users = User::where('is_deleted', 0)->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user = User::find($user->id);
        return view('pages.userDetails', compact('user'));
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
            'is_deleted' => false,
        ]);

        $user->save();

        // return redirect()->route('users.index')->with('success', 'User created successfully');
        return redirect()->route('register')->with('success', 'User registered successfully');
    }

    // Displays the form to edit an existing user (users.edit)
    public function edit(User $user)
    {
        return view('modals.editUser', compact('user'));
    }

    // Update the specified user in storage.
    public function update(Request $request, User $user)
    {
        // dd($user);
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            // 'type' => 'required|in:buyer,seller,admin',
            // 'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            // 'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);
        // if ($request->filled('password')) {
        //     $data['password'] = Hash::make($request->input('password'));
        // }
        // $user->update($data);
        $data = $request->only(['first_name', 'last_name', 'address', 'phone_number']);

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
        $user->update($data);
        // $user->update([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'address' => $request->address,
        //     'phone_number' => $request->phone_number,
        // ]);

        // $data = $request->except(['password']);
        // if ($request->hasFile('profile_photo')) {
        //     $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        // }
        return redirect()->route('users.show', $user->id)->with('success', 'User updated successfully.');
    }

    // Deletes a user
    // public function destroy(User $user)
    // {
    //     $user->delete();
    //     return redirect()->route('users.index')->with('success', 'User deleted successfully');
    // }
    public function destroy($id)
    {
        $user = User::find($id);
        $users = User::all();
        $data = User::find(Auth::user()->id);

        if ($user) {
            $user->is_deleted = 1;
            $user->save();
            // return redirect()->route('users.index')->with('success', 'User marked as deleted.');
            // return redirect()->route('admin.viewUsers')->compact('users', 'data')->with('success', 'User marked as deleted.');
            return view('admin.viewUsers', compact('users', 'data'))->with('success', 'User marked as deleted.');
        } else {
            // return redirect()->route('users.index')->with('error', 'User not found.');
            // return redirect()->route('admin.viewUsers')->compact('users', 'data')->with('error', 'User not found.');
            return view('admin.viewUsers', compact('users', 'data'))->with('error', 'User not found.');
        }
    }
}
