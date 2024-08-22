@extends('layouts.app')

@section('content')
<!-- ======= Intro Single ======= -->
<section class="intro-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="title-single-box">
                    <h1 class="title-single">{{ $property->title }}</h1>
                    <span class="color-text-a">{{ $property->city }}, {{ $property->district }}</span>
                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="property-grid.html">Properties</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ $property->title }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section><!-- End Intro Single-->
<!-- ======= Property Single ======= -->
<section class="property-single nav-arrow-b">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div id="property-single-carousel" class="swiper">
                    <div class="swiper-wrapper">
                        <div class="carousel-item-b swiper-slide property-details-img">
                            <!-- <img src="assets/img/slide-1.jpg" alt=""> -->
                            @if($property->photos->count() > 0)
                            <img src="{{asset('/uploads'.'/'.$property->photos->first()->path_name)}}"
                                alt="Card image cap" width="100%" height="100%">
                            @endif
                        </div>
                        <div class="carousel-item-b swiper-slide property-details-img">
                            <!-- <img src="assets/img/slide-2.jpg" alt=""> -->
                            @if($property->photos->count() > 0)
                            <img src="{{asset('/uploads'.'/'.$property->photos->first()->path_name)}}"
                                alt="Card image cap" width="100%" height="100%">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="property-single-carousel-pagination carousel-pagination"></div>
            </div>
            @if(Auth::check() && Auth::id() == $property->user_id)
            <div style="width: fit-content;">
                <a href="{{ route('propertiesEdit', $property->id) }}" class="button button-primary">Edit</a>
            </div>
            @endif
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 col-12">
                <div class="row section-t3">
                    <div class="col-sm-12">
                        <div class="title-box-d amenities">
                            <h3 class="title-d">Amenities</h3>
                        </div>
                    </div>
                </div>
                <div class="amenities-list color-text-a">
                    <ul class="list-a no-margin">
                        <li>Balcony</li>
                        <li>Outdoor Kitchen</li>
                        <li>Cable Tv</li>
                        <li>Deck</li>
                        <li>Tennis Courts</li>
                        <li>Internet</li>
                        <li>Parking</li>
                        <li>Sun Room</li>
                        <li>Concrete Flooring</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-between mt-3">
            <div class="col-md-5 col-lg-12">
                <div class="property-price d-flex foo">
                    <div class="card-header-c">
                        <div class="card-box-ico d-flex">
                            <span class="bi bi-cash mx-2 " style="color: green;"></span>
                            <span>$</span>
                            <span>{{ number_format($property->total_price, 2) }}</span>
                            @if($property->is_sold)
                            <p class="badge bg-primary" style="margin: auto; margin-left:12px;">Booked</p>
                            @endif
                            @if(!$property->is_sold)
                            <button class="button button-primary mx-3" style="margin:auto;">
                                <a href="{{ url('stripe', $property->id) }}" class="button-text">Book
                                    Now</a>
                            </button>
                            @endif
                        </div>

                        <!-- <div class="card-title-c align-self-center">
                                    <h5 class="title-c">15000</h5>
                                </div> -->
                    </div>
                </div>

            </div>
        </div>
        <div class="row mt-5">
            <div class="property-summary col-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box-d section-t4">
                            <h3 class="title-d">Quick Summary</h3>
                        </div>
                    </div>
                </div>
                <div class="summary-list">
                    <table class="table">
                        <!-- <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <tr>
                                <td>Property ID</td>
                                <td style="text-align: end;">1134</td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td style="text-align: end;">${{ number_format($property->total_price, 2) }}</td>
                            </tr>
                            <tr>
                                <td>Booking Price</td>
                                <td style="text-align: end;">${{ number_format($property->booking_price, 2) }}</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td style="text-align: end;">{{ $property->city }}, {{ $property->district }},
                                    {{ $property->state }}
                                </td>
                            </tr>
                            <tr>
                                <td>Property Type</td>
                                <td style="text-align: end;">{{ $property->type }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td style="text-align: end;">Sale</td>
                            </tr>
                            <tr>
                                <td>Area</td>
                                <td style="text-align: end;">{{ $property->area }}
                                    <sup>sq.ft.</sup>
                                </td>
                            </tr>
                            <tr>
                                <td>Beds</td>
                                <td style="text-align: end;">{{ $property->bedrooms }}</td>
                            </tr>
                            <tr>
                                <td>Baths</td>
                                <td style="text-align: end;">{{ $property->bathrooms }}</td>
                            </tr>
                            <tr>
                                <td>Kitchen</td>
                                <td style="text-align: end;">{{ $property->kitchens }}</td>
                            </tr>
                            <tr>
                                <td>Parking</td>
                                <td style="text-align: end;">{{ $property->parking }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- <ul class="list">
                        <li class="d-flex justify-content-between">
                            <strong>Property ID:</strong>
                            <span>1134</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Total Price:</strong>
                            <span>${{ number_format($property->total_price, 2) }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Booking Price:</strong>
                            <span>${{ number_format($property->booking_price, 2) }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Location:</strong>
                            <span>{{ $property->city }}, {{ $property->district }}, {{ $property->state }}
                            </span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Property Type:</strong>
                            <span>{{ $property->type }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Status:</strong>
                            <span>Sale</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Area:</strong>
                            <span>{{ $property->area }}
                                <sup>sq.ft.</sup>
                            </span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Beds:</strong>
                            <span>{{ $property->bedrooms }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Baths:</strong>
                            <span>{{ $property->bathrooms }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Kitchen:</strong>
                            <span>{{ $property->kitchens }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>Parking:</strong>
                            <span>{{ $property->parking }}</span>
                        </li>
                    </ul> -->
                </div>
            </div>
            <div class="col-7">
                <div class="col-sm-12">
                    <div class="title-box-d">
                        <h3 class="title-d">Property Description</h3>
                    </div>
                </div>
                <div class="property-description">
                    <p class="description color-text-a">
                        {{ $property->description }}
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                        publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </div>

        </div>
        <!-- </div> -->
        <div class="row mt-5">
            <div class="col-8">
                <ul class="nav nav-pills-a nav-pills mb-3 section-t3 display-flex justify-content-center" id="pills-tab"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-video-tab" data-bs-toggle="pill" href="#pills-video"
                            role="tab" aria-controls="pills-video" aria-selected="true" style="font-size:18px">Video</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-map-tab" data-bs-toggle="pill" href="#pills-map" role="tab"
                            aria-controls="pills-map" aria-selected="false" style="font-size:18px">Maps</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-video" role="tabpanel"
                        aria-labelledby="pills-video-tab">
                        <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0"
                            webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                    <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                        <img src="assets/img/plan2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834"
                            width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-4">
                @if ($property->users->isNotEmpty())
                <h2 style="font-size:18px; font-weight:600; display:flex; justify-content:center" class="mt-3">Contact
                    Seller</h2>
                <div class="card display-flex align-items-center mt-4" style="width:400px">
                    @foreach ($property->users as $user)
                    <div class="agent_profile">
                        <img class="card-img-top" src="{{ $user->profile_photo }}" alt="Property Seller"
                            style="width:100%">
                    </div>
                    @endforeach
                    <div class="card-body mt-2">
                        <h4 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h4>
                        <p class="card-text">{{ $user->first_name }} {{ $user->last_name }} is a very reputed Property
                            seller in
                            Noble Nests.</p>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between">
                                <strong>Phone:</strong>
                                <span class="color-text-a">{{ $user->phone_number }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <strong>Email:</strong>
                                <span class="color-text-a">{{ $user->email }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <strong>Address:</strong>
                                <span class="color-text-a">{{ $user->address }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>


        <!-- </div> -->

    </div>
    @else
    <p>This property does not have a seller associated with it.</p>
    @endif
</section><!-- End Property Single-->
@endsection