<!-- resources/views/admin/searchProperties.blade.php -->
@extends('layouts.app')

@section('content')
<h1>Search Properties</h1>

<form action="{{ route('search_results') }}" method="GET">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="bedrooms">Bedrooms</label>
        <input type="number" name="bedrooms" id="bedrooms">
    </div>
    <div>
        <label for="kitchens">Kitchens</label>
        <input type="number" name="kitchens" id="kitchens">
    </div>
    <div>
        <label for="min_price">Min Price</label>
        <input type="number" name="min_price" id="min_price">
    </div>
    <div>
        <label for="max_price">Max Price</label>
        <input type="number" name="max_price" id="max_price">
    </div>
    <div>
        <label for="area">Area</label>
        <input type="text" name="area" id="area">
    </div>
    <div>
        <button type="submit">Search</button>
    </div>
</form>
@endsection