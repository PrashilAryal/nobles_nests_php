@extends('layouts.app')

@section('content')
<div class="jumbotron">
    <div style="display: flex;">
        <h2>Welcome, {{ Auth::user()->first_name }}!</h2>
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

<!-- ======= Intro Section ======= -->
<div class="intro intro-carousel swiper position-relative">

    <div class="swiper-wrapper">
        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url('assets/slide-1.jpg')">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">Doral, Florida
                                        <br> 78345
                                    </p>
                                    <h1 class="intro-title mb-4 ">
                                        <span class="color-b">204 </span> Mount
                                        <br> Olive Road Two
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-2.jpg)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">Doral, Florida
                                        <br> 78345
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b">204 </span> Rino
                                        <br> Venda Road Five
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide carousel-item-a intro-item bg-image" style="background-image: url(assets/img/slide-3.jpg)">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">Doral, Florida
                                        <br> 78345
                                    </p>
                                    <h1 class="intro-title mb-4">
                                        <span class="color-b">204 </span> Alira
                                        <br> Roan Road One
                                    </h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">rent | $ 12.000</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div><!-- End Intro Section -->
@endsection