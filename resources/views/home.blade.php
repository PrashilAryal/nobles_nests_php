@extends('layouts.app')

@section('content')

<div class="hero-banner-section">
    <div class="hero-banner-info">
        <p>Find your premium real estate destination.</p>
        <div class="hero-banner-search">
            <!-- <input type="text" placeholder="Search"> -->
            <!-- <input type="button" value="Search" class="button button-primary"> -->
            <div class="search-container">
                <form action="#" class="d-flex search-container-form">
                    <input type="text" placeholder="Search.." name="search" class="search-input">
                    <button type="submit" class="button-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
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
                        <h5 class="property-card-title">
                            <a href="{{ route('properties.show', $property->id) }}">
                                {{ $property->title }}
                            </a>
                        </h5>
                        <div class="property-card-details row">
                            <div class="property-card-info col-6">
                                <p class="card-text"><strong>District:</strong> {{ $property->district }}</p>
                                <p class="card-text"><strong>Parking:</strong> {{ $property->parking }}</p>
                                <p class="card-text"><strong>Type:</strong> {{ $property->type }}</p>
                                <p class="card-text"><strong>Price:</strong>
                                    ${{ number_format($property->total_price, 2) }}
                                </p>
                            </div>
                            <div class="property-card-price col-6">
                                <p class="card-text">
                                    ${{ number_format($property->booking_price, 2) }}</p>
                                <button class="button button-primary">
                                    <span><span class="button-text">

                                            Book Now
                                        </span>
                                </button>
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
    <h1 class="mt-5">More Properties</h1>
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
                        <h5 class="property-card-title">
                            <a href="{{ route('properties.show', $property->id) }}">
                                {{ $property->title }}
                            </a>
                        </h5>
                        <div class="property-card-details row">
                            <div class="property-card-info col-6">
                                <p class="card-text"><strong>District:</strong> {{ $property->district }}</p>
                                <p class="card-text"><strong>Parking:</strong> {{ $property->parking }}</p>
                                <p class="card-text"><strong>Type:</strong> {{ $property->type }}</p>
                                <p class="card-text"><strong>Price:</strong>
                                    ${{ number_format($property->total_price, 2) }}
                                </p>
                            </div>
                            <div class="property-card-price col-6">
                                <p class="card-text">
                                    ${{ number_format($property->booking_price, 2) }}</p>
                                <button class="button button-primary">
                                    <span><span class="button-text">

                                            Book Now
                                        </span>
                                </button>
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
</div>
@endsection