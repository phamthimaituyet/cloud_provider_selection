<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="assets/images/logo.png" alt="">
                <span class="fs-4 text-white"><b>Trust Quality</b></span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link text-white" aria-current="page"><b>Home</b></a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white"><b>Cloud services</b></a></li>
                @if(Auth::check())
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link text-white"><b>Log out</b></a></li>
                @else
                    <li class="nav-item"><a href="{{ route('register.form') }}" class="nav-link text-white"><b>Sign up</b></a></li>
                    <li class="nav-item"><a href="{{ route('login.form') }}" class="nav-link text-white"><b>Log in</b></a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>
