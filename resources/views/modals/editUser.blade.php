@extends('layouts.app')
@section('content')
<section class="contactSection">
    <div class="contactContainer">
        <div class="contactInfo">
            <div>
                <h2>User Info</h2>
                <ul class="info">
                    <li>
                        <span><img src="{{ asset('../images/name.png') }}" alt=""></span>
                        <span>
                            {{ $user->first_name }} {{$user->last_name }}
                        </span>
                    </li>
                    <li>
                        <span><img src="{{ asset('../images/location.png') }}" alt=""></span>
                        <span>
                            {{ $user->address }}
                        </span>
                    </li>
                    <li>
                        <span><img src="{{ asset('../images/mail.png') }}" alt=""></span>
                        <span>{{ $user->email }}</span>
                    </li>
                    <li>
                        <span><img src="{{ asset('../images/phone-call.png') }}" alt=""></span>
                        <span>{{ $user->phone_number }}</span>
                    </li>
                </ul>
            </div>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="contactForm">
                <h2>Edit Profile</h2>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="contactFormBox propertyFormBox">
                    <div class="contactInputBox w50">
                        <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" autocomplete="off" required>
                        <span>First Name</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" autocomplete="off" required>
                        <span>Last Name</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" autocomplete="off" required>
                        <span>Phone Number</span>

                    </div>
                    <div class="contactInputBox w50">
                        <input type="password" id="password" name="password">
                        <span>Password</span>
                    </div>
                    <div class="contactInputBox w50">
                        <input type="text" id="address" name="address" value="{{ $user->address }}" autocomplete="off" required>
                        <span>Address</span>
                    </div>
                    <div class="contactInputBox w50">
                        <button type="submit" class="button button-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection