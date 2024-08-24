@extends('layouts.app')

@section('content')

<section id="blogs" class="py-5">
    <div class="container">
        <div class="title text-center py-4">
            <h2 class="position-relative d-inline-block"><strong>Our Blogs</strong></h2>
        </div>

        <div class="row g-3">
            @foreach ($blogs as $blog)
            <div class="card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                <div style="width:420px; height:280px;">
                    <img src="{{asset('/uploads'.'/'.$blog->image)}}" alt=""
                        style="width:100%; height:100%; object-fit:cover;">
                </div>
                <div class="card-body px-0">
                    <h4 class="card-title"
                        style="overflow:hidden; display:-webkit-box; -webkit-line-clamp:1; line-clamp:1; -webkit-box-orient:vertical; ">
                        {{ $blog->title }}
                    </h4>
                    <p class="card-text mt-3 text-muted"
                        style="overflow:hidden; display:-webkit-box; -webkit-line-clamp:4; line-clamp:4; -webkit-box-orient:vertical; text-align:justify">
                        {{ $blog->details}}
                    </p>
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