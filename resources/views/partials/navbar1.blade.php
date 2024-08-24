<!-- ======= Property Search Section ======= -->
<div class="click-closed"></div>
<!--/ Form Search Star /-->
<div class="box-collapse">
    <div class="title-box-d">
        <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
        <form action="{{ route('search_results') }}" method="GET">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="form-group">
                        <label class="pb-2" for="title">Keyword</label>
                        <input type="text" name="title" id="title" value="{{ request('title') }}"
                            class="form-control form-control-lg form-control-a" placeholder="Keyword">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="bedrooms">Bedrooms</label>
                        <input type="number" name="bedrooms" id="bedrooms" value="{{ request('bedrooms') }}"
                            class="form-control form-control-lg form-control-a" placeholder="Bedrooms">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="Kitchens">Kitchens</label>
                        <input type="number" name="kitchens" id="kitchens" value="{{ request('kitchens') }}"
                            class="form-control form-control-lg form-control-a" placeholder="Kitchens">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="min_price">Min Price</label>
                        <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}"
                            class="form-control form-control-lg form-control-a" placeholder="Min Price">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="max_price">Max Price</label>
                        <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}"
                            class="form-control form-control-lg form-control-a" placeholder="Max Price">
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <div class="form-group mt-3">
                        <label class="pb-2" for="area">Area</label>
                        <input type="number" name="area" id="area" value="{{ request('area') }}"
                            class="form-control form-control-lg form-control-a" placeholder="Area (sq.ft.)">
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <button type="submit" class="button button-primary">
                        <span class="button-text">
                            Search Property
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Property Search Section -->>
<!-- ======= Header/Navbar ======= -->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="nav_logo"><img src="{{ asset('../images/logo.png') }}" alt=""></div>
        <!-- <a class="navbar-brand text-brand" href="{{ url('/') }}">Noble<span class="color-b">Nests</span></a> -->

        <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link nav-link-t " href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-t " href="{{ url('/about-us') }}">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-t " href="{{ url('/all-properties') }}">Property</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-t " href="{{ url('/blog') }}">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-t " href="{{ url('/contact') }}">Contact</a>
                </li>
                @if (Auth::check())
                @if (Auth::user()->type == 'seller')
                <li class="nav-item">
                    <a class="nav-link nav-link-t" href="{{ route('profile') }}">Profile</a>
                </li>
                @elseif (Auth::user()->type == 'admin')
                <li class="nav-item">
                    <!-- <a class="nav-link" href="{{ route('dashboard') }}">Admin Dashboard</a> -->
                    <a class="nav-link nav-link-t" href="{{ route('adminDashboard') }}">Admin Dashboard</a>
                </li>
                @else
                <form action="{{ route('logout') }}" method="POST" class="mx-2">
                    @csrf
                    <button type="submit" class="button button-primary">Logout</button>
                </form>
                @endif
                @else
                <li class="nav-item">
                    <a class="nav-link nav-link-t" href="{{ url('/login') }}">Login</a>
                </li>
                @endif
            </ul>
        </div>

        <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01">
            <i class="bi bi-search"></i>
        </button>

    </div>
</nav><!-- End Header/Navbar -->