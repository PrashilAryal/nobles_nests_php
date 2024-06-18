<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite(['resources/js/app.js'])
</head>

<body>
   
    <div class="bg-image">
    <div class="container login-box">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card login-card card-primary">
                    <div class="card-header text-center">
                        <h4 class="m-auto p-3">Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/login') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header text-center">
                            <div class="row mb-2">
                            <div class=" text-center">
                                <img src="{{ url('assets/noblenest.png') }}" alt="logo" width="100">
                            </div>
                        </div>
                    </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" id="email" class="email form-control" maxlength="256" name="email" />
                                <span>@error('email') {{$message}} @enderror</span>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="current-password">
                                <span>@error('password') {{$message}} @enderror</span>

                            </div>
                            <div class="mb-3">
                                <a href="">Forget Password ?</a>
                            </div>
                            <div class="form-group d-grid">
                                <button class="btn btn-block px-4 py-2" style="background: #2eca6a; color: #FFFFFF; border-radius: 10px; transition: background-color 0.3s ease-in-out;font-size: 1rem;" type="submit" onmouseover="this.style.background='#2eca6a'; this.style.color='#B20A0D';" onmouseout="this.style.background='#2eca6a'; this.style.color='#FFFFFF';">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Don't have an Account ? <a href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>

</html>