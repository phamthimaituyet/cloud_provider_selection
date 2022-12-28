<header>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('products.index') }}" class="nav-link">Products</a>
            </li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" action="{{ route($page) }}" method="get">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
        </form>
    </nav>
    
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 mb-3 d-flex" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="image">
            <img src="{{ asset('vendors/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#"><i class="fas fa-address-card"></i></i> Profile</a>
        <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</header>