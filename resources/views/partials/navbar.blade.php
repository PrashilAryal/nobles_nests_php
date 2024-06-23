<nav class="navbar navbar-expand-lg nav-bar">
    <a class="navbar-brand" href="{{ url('/') }}">NobleNests</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent" style="margin-left: 80px">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Contact</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Property
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/') }}">Property Type 1</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/') }}">Property Type 2</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/') }}">Property Type 3</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">Profile</a>
            </li>
            <!-- Role-specific Links -->
            @if (Auth::user()->type == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">Admin Dashboard</a>
            </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto" style="margin-right: 20px;">
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="button button-secondary">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>