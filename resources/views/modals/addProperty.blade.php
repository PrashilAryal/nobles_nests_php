@extends('layouts.app')

@section('content')
<h1>Add Property</h1>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('properties.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
        <label for="total_price">Total Price</label>
        <input type="number" class="form-control" id="total_price" name="total_price" required>
    </div>
    <div class="form-group">
        <label for="booking_price">Booking Price</label>
        <input type="number" class="form-control" id="booking_price" name="booking_price" required>
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" required>
    </div>
    <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" id="state" name="state" required>
    </div>
    <div class="form-group">
        <label for="district">District</label>
        <input type="text" class="form-control" id="district" name="district" required>
    </div>
    <div class="form-group">
        <label for="area">Area</label>
        <input type="number" class="form-control" id="area" name="area" required>
    </div>
    <div class="form-group">
        <label for="bedrooms">Bedrooms</label>
        <input type="number" class="form-control" id="bedrooms" name="bedrooms" required>
    </div>
    <div class="form-group">
        <label for="kitchens">Kitchens</label>
        <input type="number" class="form-control" id="kitchens" name="kitchens" required>
    </div>
    <div class="form-group">
        <label for="parking">Parking</label>
        <input type="number" class="form-control" id="parking" name="parking" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Property</button>
</form>
@endsection