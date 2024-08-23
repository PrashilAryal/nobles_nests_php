<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

class StripeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function stripe($id)
    {
        $property = Property::findOrFail($id);
        return view('pages.stripe', compact('property'));
    }

    public function stripePost(Request $request, $id)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $product = Property::findOrFail($id);

        $customer = Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken,
        ]);
        // dd($product);
        $charge = Charge::create([
            'customer' => $customer->id,
            'amount' => $product->booking_price * 100, // Amount in cents
            'currency' => 'usd',
            'description' => 'Payment for ' . $product->title,
            'metadata' => [
                'site' => 'NobleNests', // Unique identifier for your site
                'product_id' => $product->id,
                'product_name' => $product->title,
            ],
        ]);
        $product->update([
            'is_sold' => true,
        ]);

        return back()->with('success', 'Payment successful!');
    }
}