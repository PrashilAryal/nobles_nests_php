<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\UserProperty;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'booking_price' => 'required|numeric',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'area' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'kitchens' => 'required|numeric',
            'parking' => 'required|numeric',
            'type' => 'required|string|max:255',
        ]);

        // Create the property
        $property = Property::create([
            'title' => $request->title,
            'total_price' => $request->total_price,
            'booking_price' => $request->booking_price,
            'city' => $request->city,
            'state' => $request->state,
            'district' => $request->district,
            'area' => $request->area,
            'bedrooms' => $request->bedrooms,
            'kitchens' => $request->kitchens,
            'parking' => $request->parking,
            'type' => $request->type,
            'user_id' => Auth::id(),
            'is_sold' => false,
            'is_deleted' => false,
        ]);
        $property->save();

        // Create the user_property relationship
        UserProperty::create([
            'user_id' => Auth::id(),
            'property_id' => $property->id,
            'is_deleted' => false,
        ]);

        return redirect()->back()->with('success', 'Property added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('pages.propertyDetails', compact('property'));
    }
    public function addPropertyView()
    {

        // if (Auth::user()->type == 'seller') {
        return view('modals.addProperty');
        // } else {
        // abort(403, 'Unauthorized action.');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $userProperty = UserProperty::where('user_id', Auth::id())
            ->where('property_id', $property->id)
            ->first();

        if (!$userProperty) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }
        // if (Auth::id() !== $property->user_id) {
        //     return redirect()->route('home')->with('error', 'Unauthorized access.');
        // }

        return view('modals.editProperty', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        // if (Auth::id() !== $property->user_id) {
        //     return redirect()->route('home')->with('error', 'Unauthorized access.');
        // }
        $userProperty = UserProperty::where('user_id', Auth::id())
                                    ->where('property_id', $property->id)
                                    ->first();

        if (!$userProperty) {
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'booking_price' => 'required|numeric',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'area' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'kitchens' => 'required|numeric',
            'parking' => 'required|numeric',
            'type' => 'required|string|max:255',
        ]);

        // Update the property
        $property->update([
            'title' => $request->title,
            'total_price' => $request->total_price,
            'booking_price' => $request->booking_price,
            'city' => $request->city,
            'state' => $request->state,
            'district' => $request->district,
            'area' => $request->area,
            'bedrooms' => $request->bedrooms,
            'kitchens' => $request->kitchens,
            'parking' => $request->parking,
            'type' => $request->type,
        ]);

        return redirect()->route('pages.propertyDetails')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}