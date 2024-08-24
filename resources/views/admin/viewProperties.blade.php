@extends('admin.adminPanel')

@section('adminContent')

<div class="recentorders">
    <div class="cardHeader">
        <h2>Properties List</h2>
    </div>
    <table class="table table-hover" style="width: 100%;">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Title</th>
                <th scope="col">Total Price</th>
                <th scope="col">Location</th>
                <th scope="col">Bedroom</th>
                <th scope="col">Kitchen</th>
                <th scope="col">Parking</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $key => $value)
            @if (!$value->is_deleted)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{ $value['title']}}</td>
                <td>
                    ${{ number_format($value->total_price, 2) }}
                </td>
                <td>{{ $value['district'] }}</td>
                <td>{{ $value['bedrooms'] }}</td>
                <td>{{ $value['kitchens'] }}</td>
                <td>{{ $value['parking'] }}</td>
                <td>
                    <a href="{{ route('properties.show', $value->id) }}" class="btn btn-primary">View</a>

                    <form action="{{ route('properties.adminDestroyProperty', $value->id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure you want to delete this property?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection