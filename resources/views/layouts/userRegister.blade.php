<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card login-card card-primary mt-3">
                    <div class="card-header text-center">
                        <div class="row mb-2">
                            <div class="login-brand text-center">
                                <img src="{{ url('assets/noblenest.png') }}" alt="logo" width="100">
                            </div>
                        </div>
                        <h4 class="m-auto p-3">Register</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="first_name">First Name:</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="type">Type:</label>
                                        <select id="type" name="type" class="form-control @error('type') is-invalid @enderror" required>
                                            <option value="buyer">Buyer</option>
                                            <option value="seller">Seller</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number:</label>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group mb-3">
                                        <label for="password">Password:</label>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation">Confirm Password:</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-grid">
                                <button class="btn btn-block px-4 py-2" style="background: #2eca6a; color: #FFFFFF; border-radius: 10px; transition: background-color 0.3s ease-in-out; font-size: 1rem;" type="submit" onmouseover="this.style.background='#F5F5F5'; this.style.color='#2eca6a';" onmouseout="this.style.background='#2eca6a'; this.style.color='#FFFFFF';">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                    <p>Already have an account ? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>