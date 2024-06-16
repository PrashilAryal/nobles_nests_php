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
    <div class="row">
        @foreach($properties as $property)
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
                    @if($property->feature)
                    <p class="card-text"><strong>Area:</strong> {{ $property->feature->area }} sq.ft</p>
                    <p class="card-text"><strong>Bedrooms:</strong> {{ $property->feature->bedrooms }}</p>
                    <p class="card-text"><strong>Kitchens:</strong> {{ $property->feature->kitchens }}</p>
                    <p class="card-text"><strong>Parking:</strong> {{ $property->feature->parking }}</p>
                    <p class="card-text"><strong>Type:</strong> {{ $property->feature->type }}</p>
                    @endif
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection