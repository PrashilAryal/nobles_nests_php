@extends('admin.adminPanel')

@section('adminContent')

<div class="container">
    <h2 class="mb-4">Create a Blog</h2>
    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        @if(Session::has('success'))
        <div class="alert alert-success">
            <span>{{ Session::get('success') }}</span>
        </div>
        @endif
        <div class="form-group mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" id="title" class="form-control" name="title" required>

        </div>

        <div class="form-group mb-3">
            <label for="details" class="form-label">Details:</label>
            <textarea class="form-control" id="details" name="details" rows="5" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="author" class="form-label">Author:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="form-group mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="form-group mb-3">
            <div style="display: flex;">
                <div>

                    <label for="image" class="form-label">Blog Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image" onchange="loadFile(event)"
                        required>
                </div>
                <img id="imagePreview" style="display: none; margin-top: 10px; max-width: 100%; height: auto;" />
            </div>
        </div>

        <button type="submit" class="button button-primary">
            <a class="button-text">
                Upload
            </a>
        </button>
    </form>
</div>

<script>
    var loadFile = function(event) {
        var image = document.getElementById('imagePreview');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.style.display = 'block';
    };
</script>

<style>
    .form-container {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }

    .mb-4 {
        margin-bottom: 1.5rem;
    }

    #imagePreview {
        height: 250px !important;
        width: 250px !important;
        object-fit: cover !important;
    }
</style>

@endsection