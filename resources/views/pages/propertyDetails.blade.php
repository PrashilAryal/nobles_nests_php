@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $property->title }}</h1>
    <p><strong>Price:</strong> ${{ number_format($property->total_price, 2) }}</p>
    <p><strong>Booking Price:</strong> ${{ number_format($property->booking_price, 2) }}</p>
    <p><strong>City:</strong> {{ $property->city }}</p>
    <p><strong>State:</strong> {{ $property->state }}</p>
    <p><strong>District:</strong> {{ $property->district }}</p>
    <p><strong>Area:</strong> {{ $property->area }} sq.ft</p>
    <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
    <p><strong>Kitchens:</strong> {{ $property->kitchens }}</p>
    <p><strong>Parking:</strong> {{ $property->parking }}</p>
    <p><strong>Type:</strong> {{ $property->type }}</p>
    @if(Auth::check() && Auth::id() == $property->user_id)
    <a href="{{ route('propertiesEdit', $property->id) }}" class="btn btn-secondary">Edit</a>
    @endif
</div>
@endsection