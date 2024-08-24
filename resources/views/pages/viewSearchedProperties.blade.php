<!-- resources/views/admin/viewProperties.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Property Listings</h1>

@if($properties->count() > 0)
<ul>
    @foreach($properties as $property)
    <li>
        <h3>{{ $property->title }}</h3>
        <p>Price: {{ $property->total_price }}</p>
        <p>Bedrooms: {{ $property->bedrooms }}</p>
        <p>Kitchens: {{ $property->kitchens }}</p>
        <p>Area: {{ $property->area }}</p>

        @foreach($property->photos as $photo)
        <img src="{{ asset('storage/' . $photo->path_name) }}" alt="Property Photo">
        @endforeach

        <p>Seller: {{ $property->users->pluck('first_name', 'last_name')->join(', ') }}</p>
        <a href="{{ route('properties.show', $property->id) }}">View Details</a>
    </li>
    @endforeach
</ul>
@else
<p>No properties found.</p>
@endif
@endsection