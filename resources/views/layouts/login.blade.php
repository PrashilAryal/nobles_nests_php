<!DOCTYPE html>
<html>

<head>
    <title>User Login</title>
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
        <div class="contactContainer propertyContainer" style="background-color:#2e3b52; border-radius: 10px;">
            <!-- <h1 class="propertyTitle">Add Property</h1> -->
            <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('../images/logo.png') }}" alt="" class="propertyIcon" style="margin-left:0">
                </a>
                <div
                    style="color:white; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <p>Don't have an account?</p>
                    <a href="{{url('/register')}}" style="text-decoration: none; color:#2eca6a;">Register</a>
                </div>
            </div>

            <form action="{{ url('/login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="contactForm propertyFormContent" style="border-radius: 10px;">
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
                        <div class="contactInputBox w100">
                            <input type="email" name="email" id="email" autocomplete="off" required>
                            <span>Email</span>
                        </div>

                        <div class="contactInputBox w100">
                            <input type="password" name="password" id="password" autocomplete="off" required>
                            <span>Password</span>
                        </div>
                        <button type="submit" class="button button-primary">
                            <a class="button-text">Login</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>