<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('../../../../css/contactUs.css') }}">
    <link rel="stylesheet" href="{{ url('../../../../css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</head>

<body>
    <section class="contactSection">
        <div class="contactContainer propertyContainer"
            style="background-color:#2e3b52; border-radius: 10px; margin:50px">
            <!-- <h1 class="propertyTitle">Add Property</h1> -->
            <div
                style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin-left:80px">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('../images/logo.png') }}" alt="" class="propertyIcon" style="margin-left:0">
                </a>
                <div
                    style="color:white; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <p>Have an account?</p>
                    <a href="{{url('/login')}}" style="text-decoration: none; color:#2eca6a;">Login</a>
                </div>
            </div>
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="contactForm propertyFormContent" style="border-radius: 10px;margin:20px 0 20px 120px;">
                    <h2>Login</h2>
                    @if(Session::has('success'))
                    <div class="messageSentSuccess my-2">
                        <span class="">{{Session::get('success')}}</span><br>
                    </div>
                    @endif
                    {{-- @if($errors->any())
                        <span>{{$error}}</span>
                    @endif --}}
                    <div class="contactFormBox propertyFormBox">
                        <div class="contactInputBox w50">
                            <input type="text" id="first_name" name="first_name" required>
                            <span>First Name</span>
                        </div>
                        <div class="contactInputBox w50">
                            <input type="text" id="last_name" name="last_name" required>
                            <span>Last Name</span>
                        </div>
                        <div class="contactInputBox w50">
                            <label for="type">Type</label>
                            <select id="type" name="type" style="width:100%;" required>
                                <option value="buyer">Buyer</option>
                                <option value="seller">Seller</option>
                            </select>
                        </div>
                        <div class="contactInputBox w50">
                            <input type="text" id="address" name="address" required>
                            <span>Address</span>
                        </div>
                        <div class="contactInputBox w50">
                            <input type="text" id="phone_number" name="phone_number" required>
                            <span>Phone Number</span>
                        </div>
                        <div class="contactInputBox w50">
                            <input type="email" id="email" name="email" required>
                            <span>Email</span>
                        </div>
                        <div class="contactInputBox w50">
                            <input type="password" id="password" name="password" required>
                            <span>Password</span>
                        </div>
                        <div class="contactInputBox w50">
                            <input type="password" id="password_confirmation" name="password_confirmation" required>
                            <span>Confirm Password</span>
                        </div>
                        <div class="contactInputBox w50">
                            <button type="submit" class="button button-primary">
                                <a class="button-text">Register</a>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>