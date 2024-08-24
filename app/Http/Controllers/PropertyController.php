<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\UserProperty;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    // Constructor to apply auth middleware
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
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
        // dd($request->all());

        $request->validate([
            'title' => 'required|max:255',
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
            'description' => $request->description,
            'bathrooms' => $request->bathrooms,
            'video_link' => $request->video_link,
            'map_link' => $request->map_link,
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

        if ($request->hasFile('primary_image')) {
            $image = $request->file('primary_image');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path("/uploads"), $fileName);
            $response["primary_image"] = $fileName;
            Photo::create([
                'path_name' => $fileName,
                'property_id' => $property->id,
                'type' => 'primary',
                'is_deleted' => false,
            ]);
        }

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $fileName = date('dmY') . time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path("/uploads"), $fileName);

                Photo::create([
                    'path_name' => $fileName,
                    'property_id' => $property->id,
                    'type' => 'additional',
                    'is_deleted' => false,
                ]);
            }
        }

        //create the photos


        return redirect()->back()->with('success', 'Property added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::with('users')->findOrFail($id);
        return view('pages.propertyDetails', compact('property'));
    }
    public function search_properties()
    {
        return view('pages.searchProperties');
    }
    public function search_results(Request $request)
    {
        // $query = Property::query();
        $query = Property::with(['photos', 'users']);

        // Apply filters based on the request inputs
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '=', $request->input('bedrooms'));
        }
        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', '=', $request->input('bathrooms'));
        }

        if ($request->filled('kitchens')) {
            $query->where('kitchens', '=', $request->input('kitchens'));
        }

        if ($request->filled('min_price')) {
            $query->where('total_price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('total_price', '<=', $request->input('max_price'));
        }

        if ($request->filled('area')) {
            $query->where('area', '=', $request->input('area'));
        }

        // Include related models (users and photos)
        $query->with(['users', 'photos']);

        $properties = $query->get();
        // $data = User::find(Auth::user()->id);
        return view('pages.viewSearchedProperties', compact('properties'));
        // return view('pages.viewSearchedProperties', compact('properties', 'data'));
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
            'title' => 'required|max:255',
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
            'bathrooms' => $request->bathrooms,
            'description' => $request->description,
            'video_link' => $request->video_link,
            'map_link' => $request->map_link,
        ]);

        $photoDetail = Photo::where('property_id', $property->id)->where('type', 'primary')->first();
        // dd($photoDetail);
        // $response = $request->all();
        // dd($response);
        if ($request->hasFile('primary_image')) {
            $image =  $request->file('primary_image');
            $fileName = date('dmY') . time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path("/uploads"), $fileName);
            $response["primary_image"] = $fileName;
        }
        // dd("Res: ", $response["primary_image"]);
        // dd("Req: ", $request);
        $photoDetail->update([
            'path_name' => $response["primary_image"],
        ]);

        return redirect()->route('profile')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function propertyDestroy(Request $request, Property $property)
    {
        // dd($property);
        $userProperty = UserProperty::where('user_id', Auth::id())->where('property_id', $property->id)->first();
        $propertyPhoto = Photo::all()->where('property_id', $property->id);

        if (!$userProperty) {
            return redirect()->route('profile')->with('error', 'Unauthorized access.');
        }

        $property->update(['is_deleted' => 1]);
        foreach ($propertyPhoto as $photo) {
            $photo->update(['is_deleted' => 1]);
        }

        return redirect()->route('profile')->with('success', 'Property deleted successfully.');
    }
}
