@extends('admin.adminPanel')

@section('adminContent')


<div class="recentorders">
    <div class="cardHeader">
        <h2>Users List</h2>
    </div>
    <table class="table table-hover" style="width: 100%;">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $value)
            @if(($value['type']=='seller' || $value['type']=='buyer') && (!$value->is_deleted))
            <tr>
                <td>{{$key+1}}</td>
                <td>{{ $value['first_name'].' '.$value['last_name']}}</td>
                <td>{{ $value['address'] }}</td>
                <td>{{ $value['phone_number'] }}</td>
                <td>{{ $value['email'] }}</td>
                <td>
                    <a href="{{ route('users.show', $value->id) }}" class="btn btn-primary">View</a>
                    <form action="{{ route('users.destroy', $value->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection