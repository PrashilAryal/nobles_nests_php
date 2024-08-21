@extends('admin.adminPanel')

@section('adminContent')

<div class="messageContainer">
    <div class="cardHeader">
        <h2>Inbox</h2>
    </div>
    <table class="table table-hover" style="width: 100%;">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $key => $message)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$message->user_firstname}} {{$message->user_lastname}}</td>
                <td>{{$message->user_subject}}</td>
                <td>{{$message->user_message}}</td>
                <td>{{$message->user_email}}</td>
                <td><a class="btn btn-danger" href="/delete-message/{{$message->id}}"> Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection