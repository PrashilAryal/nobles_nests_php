@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Search Results</h2>

    @forelse($properties as $property)
    <div class="card mb-2 my-2">
        <div class="row g-0" style="box-shadow: 1px 3px 10px 1px var(--primary-color-dark);">
            <div class="col-md-4 search-property-img">
                @php
                $primaryPhoto = $property->photos->where('type', 'primary')->first();
                @endphp

                @if ($primaryPhoto)
                <img src="{{ asset('uploads/' . $primaryPhoto->path_name) }}" class="img-fluid rounded-start"
                    alt="{{ $property->title }}">
                @else
                <img src="https://via.placeholder.com/350x150" class="img-fluid rounded-start" alt="No Image Available">
                @endif
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title">{{ $property->title }}</h5>
                    <p class="card-text"><strong>Price:</strong> ${{ number_format($property->total_price, 2) }}</p>
                    <div class="card-items">
                        <span class="card-text"><strong>Bedrooms:</strong> {{ $property->bedrooms }}</span>
                        <span class="card-text"><strong>Kitchens:</strong> {{ $property->kitchens }}</span>
                        <span class="card-text"><strong>Parkings:</strong> {{ $property->parking }}</span>
                        <span class="card-text"><strong>Location:</strong> {{ $property->city }},
                            {{ $property->district }}</span>
                        <span class="card-text"><strong>Area:</strong> {{ $property->area }} sq. ft.</span>

                        @php
                        $seller = $property->users->firstWhere('type', 'seller');
                        @endphp

                        @if ($seller)
                        <span class="card-text"><strong>Seller:</strong>
                            {{ $seller->first_name . ' ' . $seller->last_name }}
                        </span>
                        @else
                        <span class="card-text"><strong>Seller:</strong> Not Available</span>
                        @endif
                    </div>

                    <button class="button button-primary mt-2">
                        <a href="{{ route('properties.show', $property->id) }}" class="button-text">View
                            Details</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-warning">No properties found matching your criteria.</div>
    @endforelse
</div>
@endsection