@extends('admin.adminPanel')

@section('adminContent')

<div class="container">
    <h2>Create a New Blog Post</h2>
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(Session::has('success'))
        <div class="messageSentSuccess">
            <span class="">{{Session::get('success')}}</span><br>
        </div>
        @endif
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="details">Details:</label>
            <textarea class="form-control" id="details" name="details" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="image">Blog Image:</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>

        <button type="submit" class="btn btn-primary">Upload Blog</button>
    </form>
</div>


@endsection