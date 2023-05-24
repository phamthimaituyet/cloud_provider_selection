<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{ asset('assets/images/logo.png') }}" alt="">
                <span class="fs-4 text-white"><b>Trust Quality</b></span>
            </a>
            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                    <a href="{{ route('home') }}" class="nav-link text-white">
                        <i class="bi bi-house-door-fill d-block mb-1 text-center fs-4"></i>
                        <b>Home</b>
                    </a>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="{{ route('support') }}" class="nav-link text-white">
                            <i class="bi bi-sort-up  d-block mb-1 text-center fs-4"></i>
                            <b>Top Service</b>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('myProject.show') }}" class="nav-link text-white">
                            <img class="d-block mx-auto mb-1 size-img" src={{ asset("assets/images/project1.svg") }} />
                            <b>Service suggest</b>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a href="#" class="nav-link text-white dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle d-block mx-auto mb-1 text-center fs-4"></i>
                                <b>Customers</b>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="bi bi-person-lines-fill me-2"></i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @else 
                    <li>
                        <a href="{{ route('login.form') }}" class="nav-link text-white">
                            <i class="bi bi-sort-up d-block mb-1 text-center fs-4"></i>
                            <b>Top Service</b>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login.form') }}" class="nav-link text-white">
                            <img class="d-block mx-auto mb-1 size-img" src={{ asset("assets/images/project1.svg") }} />
                            <b>Service suggest</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register.form') }}" class="nav-link text-white">
                            <i class="bi bi-person-circle d-block mb-1 text-center fs-4"></i>
                            <b>Sign up</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login.form') }}" class="nav-link text-white">
                            <i class="bi bi-person-check-fill d-block mb-1 text-center fs-4"></i>
                            <b>Log in</b>
                        </a>
                    </li>
                @endif
            </ul>
           
        </div>
    </nav>
</header>
