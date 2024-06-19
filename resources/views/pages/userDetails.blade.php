@extends('layouts.app')

@section('content')
<div class="container">
    <h1>User</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <script>
                    </script>
                    <h1>{{ $user->type }}</h1>

                    <h5 class="card-title"><strong>Name:</strong>{{ $user->first_name }} {{$user->last_name}}</h5>
                    <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                    <p class="card-text"><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                    <a href="{{ route('userEdit', $user->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection