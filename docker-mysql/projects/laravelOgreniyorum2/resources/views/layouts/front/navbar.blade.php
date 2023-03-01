<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
{{--                    <a class="nav-link {{ Route::is("home") ? "active" : "" }}" aria-current="page" href="{{ route("home") }}">Home</a>--}}
{{--                    <a class="nav-link {{ Route::currentRouteName() == "home" ? "active" : "" }}" aria-current="page" href="{{ route("home") }}">Home</a>--}}
                    <a class="nav-link {{ request()->route()->getName() == "home" ? "active" : "" }}" aria-current="page" href="{{ route("home") }}">Home</a>
                </li>
                <li class="nav-item">
{{--                    <a class="nav-link {{ Route::is("about") ? "active" : "" }}" href="{{ route('about') }}">About</a>--}}
{{--                    <a class="nav-link {{ Route::currentRouteName() == "about" ? "active" : "" }}" href="{{ route('about') }}">About</a>--}}
                    <a class="nav-link {{ request()->route()->getName() == "about" ? "active" : "" }}" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    {{--                    <a class="nav-link {{ Route::is("about") ? "active" : "" }}" href="{{ route('about') }}">About</a>--}}
                    {{--                    <a class="nav-link {{ Route::currentRouteName() == "about" ? "active" : "" }}" href="{{ route('about') }}">About</a>--}}
                    <a class="nav-link {{ request()->route()->getName() == "contact" ? "active" : "" }}" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
