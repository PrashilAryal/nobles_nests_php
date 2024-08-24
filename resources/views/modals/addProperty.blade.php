@extends('layouts.app')

@section('content')
<section class="contactSection">
    <div class="contactContainer propertyContainer">
        <!-- <h1 class="propertyTitle">Add Property</h1> -->
        <img src="{{ asset('../images/house.png') }}" alt="" class="propertyIcon">
        <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data" class="propertyForm">
            @csrf
            <div class="contactForm propertyFormContent">
                <h2>Add a Property</h2>
                @if(Session::has('success'))
                <div class="messageSentSuccess">
                    <span class="">{{Session::get('success')}}</span><br>
                </div>
                @endif
                {{-- @if($errors->any())
                        <span>{{$error}}</span>
                @endif --}}
                <div class="contactFormBox propertyFormBox">
                    <!-- <div class="form-group"> -->
                    <div class="contactInputBox w50">
                        <input type="text" id="title" name="title" autocomplete="off" required>
                        <span>Title</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="string" id="type" name="type" autocomplete="off" required>
                        <span>Type</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="total_price" name="total_price" autocomplete="off" required>
                        <span>Total Price</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="booking_price" name="booking_price" autocomplete="off" required>
                        <span>Booking Price</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="city" name="city" autocomplete="off" required>
                        <span>City</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="state" name="state" autocomplete="off" required>
                        <span>State</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="district" name="district" autocomplete="off" required>
                        <span>District</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="area" name="area" autocomplete="off" required>
                        <span>Area</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="bedrooms" name="bedrooms" autocomplete="off" required>
                        <span>Bedrooms</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="bathrooms" name="bathrooms" autocomplete="off" required>
                        <span>Bathrooms</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="kitchens" name="kitchens" autocomplete="off" required>
                        <span>Kitchens</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="number" id="parking" name="parking" autocomplete="off" required>
                        <span>Parking</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="video_link" name="video_link" autocomplete="off" required>
                        <span>Video Link</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="map_link" name="map_link" autocomplete="off" required>
                        <span>Map Link</span>
                    </div>
                    <div class="contactInputBox w100">
                        <input type="textarea" id="description" name="description" autocomplete="off" required>
                        <span>Description</span>
                    </div>
                    <div class="contactInputBox w100">
                        <label for="type">Thumbnail Image</label>
                        <img class="card-img-top" id="output" src="" alt="Property Thumbnail">
                        <input type="file" class="form-control" id="primary_image" name="primary_image"
                            onchange="loadFile(event)" required>
                    </div>
                    <!-- Multiple Photos Input -->
                    <div class="contactInputBox w100">
                        <label for="photos">Additional Photos</label>
                        <input type="file" class="form-control" id="photos" name="photos[]" multiple>
                    </div>
                    <button type=" submit" class="button button-primary">
                        <a class="button-text">Add Property</a></button>
                </div>
            </div>
        </form>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
    </div>
</section>
@endsection