@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div style="display: flex;">
        <h2>Welcome, {{ Auth::user()->first_name }}!</h2>
        <!-- <img src="{{ auth()->user()->profile_photo }}" class="user-pic" id=""> -->
    </div>
    <h1 class="display-4">Welcome to NobleNests</h1>
    <p class="lead">Your premium real estate destination.</p>

    <!-- Role-specific content -->
    @if (Auth::user()->type == 'seller')
    <p>You have X properties listed for sale.</p>
    @elseif (Auth::user()->type == 'buyer')
    <p>Here are the properties you have shown interest in.</p>
    @endif
</div>
<div class="container">
    <h1>Properties</h1>
    <div class="row">
        @foreach($properties as $property)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $property->title }}</h5>
                    <img class="card-img-top" src="{{asset('/uploads'.'/'.$property->photos->first()->path_name)}}" alt="Card image cap">
                    <p class="card-text"><strong>Price:</strong> ${{ number_format($property->total_price, 2) }}</p>
                    <p class="card-text"><strong>Booking Price:</strong>
                        ${{ number_format($property->booking_price, 2) }}</p>
                    <p class="card-text"><strong>City:</strong> {{ $property->city }}</p>
                    <p class="card-text"><strong>State:</strong> {{ $property->state }}</p>
                    <p class="card-text"><strong>District:</strong> {{ $property->district }}</p>
                    <p class="card-text"><strong>Area:</strong> {{ $property->area }} sq.ft</p>
                    <p class="card-text"><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                    <p class="card-text"><strong>Kitchens:</strong> {{ $property->kitchens }}</p>
                    <p class="card-text"><strong>Parking:</strong> {{ $property->parking }}</p>
                    <p class="card-text"><strong>Type:</strong> {{ $property->type }}</p>
                    <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary">View Details</a>
                    <!-- @if(Auth::check() && Auth::id() == $property->user_id)
                    <a href="{{ route('propertiesEdit', $property->id) }}" class="btn btn-secondary">Edit</a>
                    @endif -->
                    @if(Auth::check() && \App\Models\UserProperty::where('user_id', Auth::id())->where('property_id',
                    $property->id)->exists())
                    <a href="{{ route('propertiesEdit', $property->id) }}" class="btn btn-secondary">Edit</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection