@extends('layouts.app')

@section('content')


<div class="about_image">
    <img src="{{ asset('/uploads/'.$blog->image) }}" alt="">
    <div class="about_title">
        <p class="banner-title">{{ $blog->title }}</p>

    </div>

</div>

<div class="property-description">
    <p class="description color-text-a">
        {{ $blog->details }}
    </p>
</div>

@endsection