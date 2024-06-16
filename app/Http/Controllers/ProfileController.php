<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Property;


class ProfileController extends Controller
{
    public function showProfile()
    {

        if (Auth::user()->type == 'seller') {
            $properties = Property::all()->where('user_id', Auth::user()->id)->where('is_deleted', 0);
            // return view('profile.seller');
            return view('profile.seller', compact('properties'));
        } elseif (Auth::user()->type == 'buyer') {
            return view('profile.buyer');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
    public function showDashboard()
    {
        if (Auth::user()->type == 'seller') {
            return view('dashboard.seller');
        } elseif (Auth::user()->type == 'admin') {
            return view('dashboard.admin');
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
