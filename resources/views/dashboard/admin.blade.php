<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard: Noble Nests</title>
</head>

<body>
    <h1>Admin Dashboard</h1>
    <div class="container">
        <h1>Properties</h1>
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
            @foreach($users as $user)
            @if(!$user->is_deleted)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->first_name }} {{$user->last_name}}</h5>
                        <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                        <p class="card-text"><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">View Details</a>

                        <a href="{{ route('userEdit', $user->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</body>

</html>

</html>