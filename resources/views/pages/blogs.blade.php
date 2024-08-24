@extends('layouts.app')

@section('content')

<section id="blogs" class="py-5">
    <div class="container">
        <div class="title text-center py-5">
            <h2 class="position-relative d-inline-block">Our Latest Blog</h2>
        </div>

        <div class="row g-3">
            @foreach ($blogs as $blog)
            <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                <img src="{{asset('/uploads'.'/'.$blog->image)}}" alt="">
                <div class="card-body px-0">
                    <h4 class="card-title">{{ $blog->title }}</h4>
                    <p class="card-text mt-3 text-muted">{{ $blog->details}}</p>
                    <p class="card-text">
                        <small class="text-muted">
                            <span class="fw-bold">Author: </span>{{ $blog->author }}
                        </small>
                    </p>
                    <a href="{{ route('blog.details', $blog->id) }}" class="btn1">Read More</a>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>

@endsection