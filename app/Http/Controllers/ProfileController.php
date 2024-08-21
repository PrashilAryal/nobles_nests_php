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
    public function showAdminPanel()
    {
        $users = User::all();
        $data = User::find(Auth::user()->id);
        if (Auth::user()->type == 'seller') {
            return view('dashboard.seller');
        } elseif (Auth::user()->type == 'admin') {
            return view('admin.adminPanel', compact('data', 'users'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
    public function showAdminDashboard()
    {

        $adminObj = User::find(Auth::user()->id);
        $data = User::find(Auth::user()->id);
        // if($adminObj->chef_role == 'admin'){
        $users = User::all();
        $properties = Property::all();
        // return view('adminpanel', ['chefs'=>$item], ['data'=>$adminObj], ['recipes'=>$recipeList]);
        return view('admin.adminDashboard', compact('users', 'data', 'properties'));

        //    }else{
        //         return view('adminlogin');
        //    }  
    }

    public function showProperties()
    {
        $properties = Property::all()->where('user_id', Auth::user()->id)->where('is_deleted', 0);
        return view('profile.seller', compact('properties'));
        // return view('home');}
    }
}
