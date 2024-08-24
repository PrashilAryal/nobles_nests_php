@extends('layouts.app')

@section('content')
<div class="row">
    <div class="about_image">
        <img src="{{ asset('../images/about-us.jpg') }}" alt="">
        <div class="about_title">
            <p>Properties</p>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="jumbotron">

    </div>
    <h1>Properties</h1>
    <div class="row gx-2">
        @foreach($properties as $property)
        @if(!$property->is_deleted)
        <div class="p-3 col-3 col-md-3 col-sm-6">
            <div class="property-card">
                <!-- <div class="property-card"> -->
                <div class="card-img">
                    @if($property->photos->count() > 0)
                    <img src="{{asset('/uploads'.'/'.$property->photos->first()->path_name)}}" alt="Card image cap"
                        width="100%" height="100%">
                    @endif
                </div>
                <div class="property-card-container">
                    <div class="property-card-body">
                        <h6 class="property-card-title">
                            <a href="{{ route('properties.show', $property->id) }}">
                                {{ $property->title }}
                            </a>
                        </h6>
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
                                <!-- <button class="button button-primary">
                                    Book Now
                                </button> -->
                                @if($property->is_sold)
                                <p class="badge bg-primary" style="margin: auto; margin-left:12px;">Booked</p>
                                @endif
                                @if(!$property->is_sold)
                                <button class="button button-primary" style="margin:auto;">
                                    <a href="{{ url('stripe', $property->id) }}"
                                        style="text-decoration: none; color: white">Book
                                        Now</a>
                                </button>
                                @endif
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
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @include('partials.propertyCarousel')
</div>
@endsection