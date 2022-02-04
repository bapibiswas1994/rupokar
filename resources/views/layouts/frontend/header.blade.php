<header>
    <div class="topbar">
        <div class="container">
            <div class="d-flex">
                <i class="fa fa-phone mt-1 mr-1" aria-hidden="true"></i> <a href="tel:+91 8069188100">+91 8069188100</a>
            </div>

            <div class="d-flex">
                <a href=""><i class="fa fa-instagram mr-2" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-facebook-square mr-2" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>

    <div class="logo-area mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{ url('/') }}"><img src="{{ asset('frontend-assets/images/logo.png') }}"
                            alt="rupokar logo"></a>
                </div>
                <div class="col-md-8">
                    <div class="searchwrapper">
                        <div class="searchbox">
                            <div class="row">
                                <div class="col-md-8"><input type="text" class="form-control"
                                        placeholder="Search by Keywords..."></div>
                                <div class="col-md-3">
                                    <select class="form-control category">
                                        <option>Paintings</option>
                                        <option>Art & Illustrations</option>
                                        <option>Digital Art</option>
                                        <option>Artists</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <div type="button" class="btn btn-primary" class="form-control"><i
                                            class="fa fa-search" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div type="button" class="btn btn-primary login-btn w-100" class="form-control" onclick="openNav()">
                        Login</div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg my-nav quick-fix-sticky">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Catagories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Paintings</a>
                            <a class="dropdown-item" href="#">Art & Illustrations</a>
                            <a class="dropdown-item" href="#">Digital Art</a>
                            <a class="dropdown-item" href="#">Artists</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!---------------- sidebar ------------------>

    <div id="myNav" class="overlay">
        <div class="d-flex justify-content-between">
            <h2 class="p-4">Login</h2>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>
        <div class="overlay-content p-5">
            <div class="row text-center">
                <div class="col-md-2 p-0">
                    <input type="text" value="+91" disabled="" class="form-control">
                </div>
                <div class="col-md-10 p-0">
                    <input type="number" placeholder="Enter Phone Number" class="form-control">
                </div>
                <div type="button" class="btn btn-primary login-btn w-100 mt-3" class="form-control">Login</div>
            </div>
            <div class="form-group text-center mt-4">
                <label class="">or</label>
                <a href="javascript:void(0)" class="">Create an account</a>
            </div>
        </div>
    </div>

</header>