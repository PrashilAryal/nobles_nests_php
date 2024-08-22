<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Property;
use App\Models\UserProperty;
use App\Models\Photo;
use Stripe\Charge;
use Stripe\Stripe;

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
    public function contact()
    {
        return view('pages/contactUs');
    }
    public function about()
    {
        return view('pages/aboutUs');
    }
    public function properties()
    {
        $properties = Property::all()->where('is_deleted', 0);
        return view('pages/properties', compact('properties'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    public function view_user()
    {
        $users = User::all();
        $data = User::find(Auth::user()->id);
        return view('admin.viewUsers', compact('users', 'data'));
    }
    public function view_properties()
    {
        $properties = Property::all();
        $data = User::find(Auth::user()->id);
        return view('admin.viewProperties', compact('properties', 'data'));
    }

    public function adminDestroyProperty(Request $request, Property $property)
    {
        // dd($property);
        $userProperty = UserProperty::where('user_id', Auth::id())->where('property_id', $property->id)->first();
        $propertyPhoto = Photo::all()->where('property_id', $property->id);

        // if (!$userProperty) {
        // return redirect()->route('profile')->with('error', 'Unauthorized access.');
        // }

        $property->update(['is_deleted' => 1]);
        foreach ($propertyPhoto as $photo) {
            $photo->update(['is_deleted' => 1]);
        }
        $properties = Property::all();
        $data = User::find(Auth::user()->id);
        // return redirect()->route('profile')->with('success', 'Property deleted successfully.');
        return view('admin.viewProperties', compact('properties', 'data'))->with('success', 'Property deleted successfully.');
    }
    public function transactions()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charges = Charge::all(['limit' => 100]);

        // Filter charges with metadata['site'] matching 'your-site-identifier'
        $filteredCharges = array_filter($charges->data, function ($charge) {
            return isset($charge->metadata['site']) && $charge->metadata['site'] === 'NobleNests';
        });
        $charges = $filteredCharges;
        $data = User::find(Auth::user()->id);

        return view('admin.viewTransactions', compact('charges', 'data'));
    }
}