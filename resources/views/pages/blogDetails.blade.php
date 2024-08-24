@extends('layouts.app')

@section('content')


<div class="about_image">
    <img src="{{ asset('/uploads/'.$blog->image) }}" alt="">
    <div class="about_title">
        <p class="banner-title">{{ $blog->title }}</p>

    </div>

</div>
<div class="container">
    <div class="property-description" style="text-align: justify; line-height: 2;">
        <p class="description color-text-a mt-5">
            {!! $blog->details !!}
        </p>
        <div style="display: flex; flex-direction: column;">
            <span>
                <strong>Author:</strong> {{ $blog->author }}
            </span>
            <span>
                <strong>Date:</strong> {{ $blog->date }}
            </span>
        </div>
    </div>
</div>

@endsection