@extends('layouts.app')

@section('content')
<div class="profile">
    <div class="profile-banner">
        <div class="user-profile-image">
            <img src="{{ auth()->user()->profile_photo }}" alt="" width="100px" height="100px">
        </div>
        <div class="profile-header">
            <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
            <form action="{{ route('userEdit', auth()->user()->id) }}" method="GET">
                @csrf
                <button type="submit" class="button button-primary">Edit</button>
            </form>
        </div>
        <div class="user-profile-details">
            <p>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
            <p>{{ auth()->user()->phone_number }}</p>
            <p>{{ auth()->user()->email }}</p>
            <p>{{ auth()->user()->address }}</p>
        </div>
    </div>
    <div class="container pt-4">
        <div class="d-flex justify-content-end align-items-center text-align-center">
            <p class="mb-0 px-2 fs-6">Add a new property</p>
            <form action="{{ route('propertiesAdd') }}" method="GET">
                @csrf
                <button type="submit" class="button button-primary">Add</button>
            </form>
        </div>

        <div class="container">
            <h1>Your Properties</h1>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="row gx-2">
                @foreach($properties as $property)
                @if(!$property->is_deleted)
                <div class="p-3 col-3 col-md-3 col-sm-6">
                    <div class="property-card">
                        <div class="card-img">
                            @if($property->photos->count() > 0)
                            <img src="{{asset('/uploads'.'/'.$property->photos->first()->path_name)}}"
                                alt="Card image cap" width="100%" height="100%">
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
                                    <a href="{{ route('properties.show', $property->id) }}"
                                        class="button button-primary text-decoration-none">View
                                        Details</a>
                                </div>
                                @if(Auth::check() && \App\Models\UserProperty::where('user_id',
                                Auth::id())->where('property_id',
                                $property->id)->exists())
                                <div class="property-card-action-buttons">
                                    <a href="{{ route('propertiesEdit', $property->id) }}"
                                        class="button button-secondary text-decoration-none">Edit</a>
                                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="button button-danger"
                                            onclick="return confirm('Are you sure you want to delete this property?');">Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection