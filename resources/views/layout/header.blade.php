<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="/assets/images/logo.png" alt="">
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
                        <a href="{{ route('compareProduct') }}" class="nav-link text-white">
                            <div class="comparison-font">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 49 49" fill="none" class="d-block mb-1 text-center mx-auto">
                                    <g clip-path="url(#clip0_5_2549)">
                                        <path d="M39.5 10.3572H26.0975V5.85718H23.0975V10.3572H9.5L0.5 23.8572C0.5 26.2441 1.44821 28.5333 3.13604 30.2211C4.82387 31.909 7.11305 32.8572 9.5 32.8572C11.8869 32.8572 
                                        14.1761 31.909 15.864 30.2211C17.5518 28.5333 18.5 26.2441 18.5 23.8572L11.5025 13.3572H23.105V39.6072H9.5V42.6072H39.5V39.6072H26.0975V13.3572H37.4975L30.5 23.8572C30.5 
                                        26.2441 31.4482 28.5333 33.136 30.2211C34.8239 31.909 37.1131 32.8572 39.5 32.8572C41.8869 32.8572 44.1761 31.909 45.864 30.2211C47.5518 28.5333 48.5 26.2441 48.5 23.8572L39.5 
                                        10.3572ZM9.5 15.7647L14.8925 23.8572H4.1075L9.5 15.7647ZM9.5 29.8572C8.44782 29.8561 7.41443 29.5784 6.50349 29.0518C5.59255 28.5252 4.83609 27.7684 4.31 26.8572H14.69C14.1639 
                                        27.7684 13.4075 28.5252 12.4965 29.0518C11.5856 29.5784 10.5522 29.8561 9.5 29.8572ZM44.8925 23.8572H34.1075L39.5 15.7647L44.8925 23.8572ZM39.5 29.8572C38.4478 29.8561 37.4144 
                                        29.5784 36.5035 29.0518C35.5925 28.5252 34.8361 27.7684 34.31 26.8572H44.69C44.1639 27.7684 43.4075 28.5252 42.4965 29.0518C41.5856 29.5784 40.5522 29.8561 39.5 29.8572Z" fill="white">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <b>Comparisons</b>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('myProject.show') }}" class="nav-link text-white">
                            <img class="d-block mx-auto mb-1 size-img" src="/assets/images/project1.svg" />
                            <b>Service suggest</b>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <a href="" class="nav-link text-white dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                        <a href="{{ route('compareProduct') }}" class="nav-link text-white">
                            <div class="comparison-font">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" viewBox="0 0 49 49" fill="none" class="d-block mb-1 text-center mx-auto">
                                    <g clip-path="url(#clip0_5_2549)">
                                        <path d="M39.5 10.3572H26.0975V5.85718H23.0975V10.3572H9.5L0.5 23.8572C0.5 26.2441 1.44821 28.5333 3.13604 30.2211C4.82387 31.909 7.11305 32.8572 9.5 32.8572C11.8869 32.8572 
                                        14.1761 31.909 15.864 30.2211C17.5518 28.5333 18.5 26.2441 18.5 23.8572L11.5025 13.3572H23.105V39.6072H9.5V42.6072H39.5V39.6072H26.0975V13.3572H37.4975L30.5 23.8572C30.5 
                                        26.2441 31.4482 28.5333 33.136 30.2211C34.8239 31.909 37.1131 32.8572 39.5 32.8572C41.8869 32.8572 44.1761 31.909 45.864 30.2211C47.5518 28.5333 48.5 26.2441 48.5 23.8572L39.5 
                                        10.3572ZM9.5 15.7647L14.8925 23.8572H4.1075L9.5 15.7647ZM9.5 29.8572C8.44782 29.8561 7.41443 29.5784 6.50349 29.0518C5.59255 28.5252 4.83609 27.7684 4.31 26.8572H14.69C14.1639 
                                        27.7684 13.4075 28.5252 12.4965 29.0518C11.5856 29.5784 10.5522 29.8561 9.5 29.8572ZM44.8925 23.8572H34.1075L39.5 15.7647L44.8925 23.8572ZM39.5 29.8572C38.4478 29.8561 37.4144 
                                        29.5784 36.5035 29.0518C35.5925 28.5252 34.8361 27.7684 34.31 26.8572H44.69C44.1639 27.7684 43.4075 28.5252 42.4965 29.0518C41.5856 29.5784 40.5522 29.8561 39.5 29.8572Z" fill="white">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <b>Comparisons</b>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login.form') }}" class="nav-link text-white">
                            <img class="d-block mx-auto mb-1 size-img" src="/assets/images/project1.svg" />
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
