@extends('layouts.app')



@section('content')
<section class="contactSection">
    <div class="contactContainer propertyContainer">
        <img src="{{ asset('../images/house.png') }}" alt="" class="propertyIcon">

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form method="POST" action="{{ route('properties.update', $property->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="contactForm propertyFormContent">

                <h2>Edit Property</h2>
                <div class="contactFormBox propertyFormBox">

                    <div class="contactInputBox w50">
                        <input type="text" id="title" name="title" value="{{ $property->title }}" required>
                        <span>Title</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="total_price" name="total_price" value="{{ $property->total_price }}"
                            required>
                        <span for="total_price">Total Price</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="booking_price" name="booking_price"
                            value="{{ $property->booking_price }}" required>
                        <span for="booking_price">Booking Price</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="city" name="city" value="{{ $property->city }}" required>
                        <span>City</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="state" name="state" value="{{ $property->state }}" required>
                        <span>State</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="district" name="district" value="{{ $property->district }}" required>
                        <span>District</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="area" name="area" value="{{ $property->area }}" required>
                        <span>Area</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="bedrooms" name="bedrooms" value="{{ $property->bedrooms }}" required>
                        <span>Bedrooms</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="kitchens" name="kitchens" value="{{ $property->kitchens }}" required>
                        <span>Kitchens</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="parking" name="parking" value="{{ $property->parking }}" required>
                        <span>Parking</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="type" name="type" value="{{ $property->type }}" required>
                        <span>Type</span>
                    </div>

                    <div class="contactInputBox w100">
                        <label for="type">Thumbnail Image</label>
                        @php
                        $primaryPhoto = $property->photos->firstWhere('type', 'primary');
                        @endphp

                        @if($primaryPhoto)
                        <img class="card-img-top" id="output" src="{{ asset('/uploads/'.$primaryPhoto->path_name) }}"
                            alt="Card Thumbnail">
                        @endif
                        <input type="file" class="form-control" id="primary_image" name="primary_image"
                            onchange="loadFile(event)" required>
                    </div>
                    <button type="submit" class="button button-primary">Update Property</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    </div>

    @endsection