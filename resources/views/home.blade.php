@extends('layouts.app')

@section('content')

<div class="hero-banner-section">
    <div class="hero-banner-info">
        <p>Find your premium real estate destination.</p>
        <div class="hero-banner-search">
            <input type="text" placeholder="Search">
            <input type="button" value="Search" class="button button-primary">
        </div>
    </div>
</div>

<div class="container">
    <div class="jumbotron">
        <!-- Role-specific content -->
        @if (Auth::user()->type == 'seller')
        <p>{{ Auth::user()->first_name }}, you have X properties listed for sale.</p>
        @elseif (Auth::user()->type == 'buyer')
        <p>{{ Auth::user()->first_name }}, here are the properties you have shown interest in.</p>
        @endif
    </div>
    <h1>Properties</h1>
    <div class="row gx-2">
        @foreach($properties as $property)
        @if(!$property->is_deleted)
        <div class="p-3 col-3 col-md-3 col-sm-6">
            <div class="property-card ">
                <!-- <div class="property-card"> -->
                <div class="card-img">
                    @if($property->photos->count() > 0)
                    <img src="{{asset('/uploads'.'/'.$property->photos->first()->path_name)}}" alt="Card image cap" width="100%" height="100%">
                    @endif
                </div>
                <div class="property-card-container">
                    <div class="property-card-body">
                        <h5 class="property-card-title">{{ $property->title }}</h5>
                        <div class="property-card-details row">
                            <div class="property-card-info col-7">
                                <p class="card-text"><strong>District:</strong> {{ $property->district }}</p>
                                <p class="card-text"><strong>Parking:</strong> {{ $property->parking }}</p>
                                <p class="card-text"><strong>Type:</strong> {{ $property->type }}</p>
                                <p class="card-text"><strong>Price:</strong>
                                    ${{ number_format($property->total_price, 2) }}
                                </p>
                            </div>
                            <div class="property-card-price col-5">
                                <p class="card-text">
                                    ${{ number_format($property->booking_price, 2) }}</p>
                                <button class="button button-primary">Book Now</button>

                            </div>
                        </div>
                    </div>
                    <div class="property-card-footer">
                        <div class="property-card-info-item">
                            <span>{{ $property->bedrooms }}</span>
                            <p>Bedrooms</p>
                        </div>
                        <div class="property-card-info-item">
                            <span> {{ $property->kitchens }}</span>
                            <p>Kitchens</p>
                        </div>
                        <div class="property-card-info-item">
                            <span>{{ $property->area }}</span>
                            <p>Area (sq.ft)</p>
                        </div>
                    </div>
                    <div class="property-card-buttons">
                        <div class="property-card-view-details">
                            <a href="{{ route('properties.show', $property->id) }}" class="button button-primary text-decoration-none">View
                                Details</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif
        @endforeach
    </div>

</div>
@endsection