@extends('layouts.app')

@section('content')
<h1>Seller Profile</h1>
<p>Profile information and seller-specific features.</p>

<form action="{{ route('propertiesAdd') }}" method="GET">
    @csrf
    <button type="submit" class="btn btn-success">Add Property</button>
</form>

<div class="container">
    <h1>Properties</h1>
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
    <div class="row">
        @foreach($properties as $property)
        @if(!$property->is_deleted)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $property->title }}</h5>
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
                    @if(Auth::check() && \App\Models\UserProperty::where('user_id', Auth::id())->where('property_id',
                    $property->id)->exists())
                    <a href="{{ route('propertiesEdit', $property->id) }}" class="btn btn-secondary">Edit</a>
                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this property?');">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</div>
@endsection