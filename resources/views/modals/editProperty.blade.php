@extends('layouts.app')



@section('content')
<div class="container">
    <h1>Edit Property</h1>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form method="POST" action="{{ route('properties.update', $property->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $property->title }}" required>
        </div>
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" class="form-control" id="total_price" name="total_price" value="{{ $property->total_price }}" required>
        </div>
        <div class="form-group">
            <label for="booking_price">Booking Price</label>
            <input type="number" class="form-control" id="booking_price" name="booking_price" value="{{ $property->booking_price }}" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $property->city }}" required>
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" value="{{ $property->state }}" required>
        </div>
        <div class="form-group">
            <label for="district">District</label>
            <input type="text" class="form-control" id="district" name="district" value="{{ $property->district }}" required>
        </div>
        <div class="form-group">
            <label for="area">Area</label>
            <input type="text" class="form-control" id="area" name="area" value="{{ $property->area }}" required>
        </div>
        <div class="form-group">
            <label for="bedrooms">Bedrooms</label>
            <input type="text" class="form-control" id="bedrooms" name="bedrooms" value="{{ $property->bedrooms }}" required>
        </div>
        <div class="form-group">
            <label for="kitchens">Kitchens</label>
            <input type="text" class="form-control" id="kitchens" name="kitchens" value="{{ $property->kitchens }}" required>
        </div>
        <div class="form-group">
            <label for="parking">Parking</label>
            <input type="text" class="form-control" id="parking" name="parking" value="{{ $property->parking }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $property->type }}" required>
        </div>

        <div class="form-group">
            <label for="type">Thumbnail Image</label>
            @if($property->photos->count() > 0)
            <img class="card-img-top" id="output" src="{{asset('/uploads'.'/'.$property->photos->first()->path_name)}}" alt="Card image cap">
            @endif
            <input type="file" class="form-control" id="primary_image" name="primary_image" onchange="loadFile(event)" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Property</button>
    </form>
</div>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
@endsection