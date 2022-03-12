<nav class="navbar navbar-expand-lg navbar-light sticky-top navbar__custom" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('frontend-assets/img/logo.svg') }}" height="31" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#feature">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#validation">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#superhero">About US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#marketing">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex ms-lg-4">
                <a class="btn btn-secondary-outline" href="#!">Sign In</a>
                <a class="btn btn-warning ms-3" href="#!">Sign Up</a>
            </div>
        </div>
    </div>
</nav>