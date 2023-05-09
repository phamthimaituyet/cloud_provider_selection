<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                <span class="fs-4 text-white"><b>Trust Quality</b></span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-white" aria-current="page"><b>Home</b></a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a href="{{ route('support') }}">
                            <button class="codepro-custom-btn codepro-btn-5" target="blank">
                                <span><b>Service selection support</b></span>
                            </button>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login.form') }}">
                            <button class="codepro-custom-btn codepro-btn-5" target="blank">
                                <span><b>Service selection support</b></span>
                            </button>
                        </a>
                    </li>
                @endif
                @if(Auth::check())
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link text-white"><b>Log out</b></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('register.form') }}" class="nav-link text-white"><b>Sign up</b></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login.form') }}" class="nav-link text-white"><b>Log in</b></a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
