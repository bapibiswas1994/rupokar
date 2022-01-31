<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <span class="navbar-brand-full">{{ env('APP_NAME', 'Permissions Manager') }}</span>
        <span class="navbar-brand-minimized">{{ env('APP_NAME', 'Permissions Manager') }}</span>
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        @if(count(config('panel.available_languages', [])) > 1)
        <li class="nav-item dropdown d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                {{ strtoupper(app()->getLocale()) }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @foreach(config('panel.available_languages') as $langLocale => $langName)
                <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{
                    strtoupper($langLocale) }}
                    ({{ $langName }})</a>
                @endforeach
            </div>
        </li>
        @endif
    </ul>
</header>