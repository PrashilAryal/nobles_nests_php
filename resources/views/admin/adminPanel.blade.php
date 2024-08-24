<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard
    </title>
    <link rel="stylesheet" href="{{ URL::asset('css/admin.css'); }}" />
    <link rel="stylesheet" href="{{ asset('css/recipe.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Encode+Sans+SC:wght@300;400;900&family=Fira+Sans&family=Ubuntu:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="https://kit.fontawesome.com/6ac97bb13c.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="navigation">
        <div class="adminLogo">
            <a href="{{url('/adminDashboard')}}">
                <img src="{{asset('images/logo.png')}}" alt="logo">
                <!-- <span class="title">NobleNests</span> -->
            </a>
        </div>
        <ul>
            <li>
                <a href="{{url('/adminDashboard')}}">
                    <span class="icon">
                        <i class="fa-solid fa-chart-line"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{url('/view-users')}}">
                    <span class="icon">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <span class="title">Users</span>
                </a>
            </li>
            <li>
                <a href="{{url('/view-properties')}}">
                    <span class="icon">
                        <i class="fa-solid fa-home"></i>
                    </span>
                    <span class="title">Properties</span>
                </a>
            </li>
            <li>
                <a href="{{url('/transactions')}}">
                    <span class="icon">
                        <i class="fa-solid fa-home"></i>
                    </span>
                    <span class="title">Transactions</span>
                </a>
            </li>
            <li>
                <a href="{{url('/view-message')}}">
                    <span class="icon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <span class="title">Message</span>
                </a>
            </li>
            <li>
                <a href="{{url('/')}}">
                    <span class="icon">
                        <i class="fa-solid fa-left-long"></i>
                    </span>
                    <span class="title">Go to website</span>
                </a>
            </li>
            <!-- <li>
                <a href="{{url('/admin-setting')}}">
                    <span class="icon">
                        <i class="fa-solid fa-gear"></i>
                    </span>
                    <span class="title">Setting</span>
                </a>
            </li> -->
            <li>
                <a href="{{url('/blog-upload')}}">
                    <span class="icon">
                        <!-- <ion-icon name="settings-outline"></ion-icon> -->
                        <i class="fa-solid fa-newspaper"></i>
                    </span>
                    <span class="title">Blog</span>
                </a>
            </li>

            <li>

                <a>
                    <span class="icon" style="color: white;">
                        <i class="fa fa-right-from-bracket" style="color: white;"></i>
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="mx-2"
                        style="display:flex; justify-content:center; align-items:center;">

                        @csrf
                        <button type="submit" style="background:transparent; color:white; border:none;">Logout</button>
                    </form>
                </a>
            </li>
        </ul>
    </div>
    <!-- main -->
    <div class="container">
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <!-- <form action="{{url('/search')}}" method="get">

                    <div class="search">
                        <label for="">
                            <input type="text" placeholder="Search Chef" name="srch_chef" />
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </label>
                    </div>
                </form> -->
                <!-- userImg -->
                <div class="adminTopName">
                    <h5 class="mx-2">{{$data->first_name}} {{$data->last_name}}</h5>
                    <div class="user">
                        <span>
                            <img src="{{ $data->profile_photo }}" alt="">
                            <!-- <ion-icon name="person-circle-sharp" size="large"></ion-icon> -->
                        </span>
                    </div>
                </div>
            </div>
            <!-- cards -->
            {{-- <div class="cardBox">
          <div class="card">
            <div>
              <div class="numbers">1,504</div>
              <div class="CardName">Daily Views</div>
            </div>
            <div class="iconBox">
              <ion-icon name="eye-outline"></ion-icon>
            </div>
          </div>
          <div class="card">
            <div>
              <div class="numbers">1,504</div>
              <div class="CardName">Daily Views</div>
            </div>
            <div class="iconBox">
              <ion-icon name="eye-outline"></ion-icon>
            </div>
          </div>
          <div class="card">
            <div>
              <div class="numbers">1,504</div>
              <div class="CardName">Daily Views</div>
            </div>
            <div class="iconBox">
              <ion-icon name="eye-outline"></ion-icon>
            </div>
          </div>
          <div class="card">
            <div>
              <div class="numbers">1,504</div>
              <div class="CardName">Daily Views</div>
            </div>
            <div class="iconBox">
              <ion-icon name="eye-outline"></ion-icon>
            </div>
          </div>
        </div> --}}
            <!-- order detail list -->
            <div class="details">
                @yield('adminContent')
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
    //Menu toogle
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");

    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };

    //add hovered class in selected list item
    let list = document.querySelectorAll(".navigation li");

    function activelink() {
        list.forEach((item) => item.classList.remove("hovered"));
        this.classList.add("hovered");
    }
    list.forEach((item) => item.addEventListener("mouseover", activelink));
    </script>
</body>

</html>