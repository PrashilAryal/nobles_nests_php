<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;
use App\Models\User;


class ProfileController extends Controller
{
    public function showProfile()
    {


        if (Auth::user()->type == 'seller') {
            $userId = Auth::user()->id;
            $properties = Property::whereHas('userProperties', function ($query) use ($userId) {
                $query->where('user_id', $userId)->where('is_deleted', 0);
            })->with('photos')->get();
            // dd($properties);
            // $properties = Property::all()->where('user_id', Auth::user()->id)->where('is_deleted', 0);
            // return view('profile.seller');
            return view('profile.seller', compact('properties'));
        } elseif (Auth::user()->type == 'buyer') {
            return view('profile.buyer');
        } elseif (Auth::user()->type == 'admin') {
            return view('profile.admin');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
    public function showDashboard()
    {
        $users = User::all();
        if (Auth::user()->type == 'seller') {
            return view('dashboard.seller');
        } elseif (Auth::user()->type == 'admin') {
            return view('dashboard.admin', compact('users'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function showProperties()
    {
        $properties = Property::all()->where('user_id', Auth::user()->id)->where('is_deleted', 0);
        return view('profile.seller', compact('properties'));
        // return view('home');}
    }
}
