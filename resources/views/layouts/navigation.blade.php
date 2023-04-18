<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="icon" href="{{ asset('/img/extra/logo.png') }}">

    <style>
        a.nav-link {
            padding: 14px;
            border-bottom: 1.5px solid transparent;
            /* color: #ab9002; */
            position: relative;
            font-size: 20px;
        }

        #navbarSupportedContent.show {
            z-index: 1;
        }

        #navbarSupportedContent ul {
            /* height: 0; */
        }

        #navbarSupportedContent ul li {
            width: fit-content;
        }

        a.nav-link::after {
            content: "";
            height: 1px;
            width: 100%;
            position: absolute;
            background-color: gold;
            transform: scaleX(0);
            transition: transform 250ms ease-in-out;
            left: 0;
            bottom: 10px;
        }

        a.nav-link:hover::after,
        .ms-auto a.nav-link:focus::after {
            transform: scaleX(1);
        }

        a.nav-link:hover,
        .ms-auto a.nav-link:focus,
        .active a.nav-link {
            color: gold;
        }


        .active a.nav-link::before {
            content: "";
            /* height: 0; */
            width: 0;
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            border-bottom: 7px solid gold;
            position: absolute;
            left: 50%;
            transform: translate(-7px, 0);
            bottom: 0;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="height: 118px;background-image: url('/img/extra/header_image_2.png'); background-color: #1D1D1D; background-size: 420px; background-repeat:no-repeat; background-position: right;">
        <div class="container" style="margin-left: 50px">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/img/extra/logo.png') }}" alt="Monster Hunter World" width="200">
            </a>

            <button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ ('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ (Request::is('/') || Request::is('home')) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('directory') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/directory') }}">Directory</a>
                    </li>
                    <li class="nav-item {{ Request::is('posts') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/posts') }}">Posts</a>
                    </li>

                    @if(Auth::guard('admin')->check() || Auth::guard('superuser')->check())
                    <li class="nav-item {{ Request::is('authorize') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/authorize') }}">Authorize</a>
                    </li>

                    @endif

                </ul>

                <ul class="navbar-nav ms-auto" style="height:0px; margin-right: 270px;">
                    @if(Auth::guard()->check() || Auth::guard('admin')->check() || Auth::guard('superuser')->check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(Auth::guard('admin')->check())
                            {{ Auth::guard('admin')->user()->name }}
                            @elseif(Auth::guard('superuser')->check())
                            {{ Auth::guard('superuser')->user()->name }}
                            @else
                            {{ Auth::user()->name}}
                            @endif
                        </a>

                        <ul class="dropdown-menu dropdown-menu-dark" style="margin-top: 55px;" aria-labelledby="dropdownMenuLink">
                            <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li> -->
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>

                    </li>
                    @else
                    @if (Route::has('login'))
                    <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @endif
                </ul>

                <!-- @if(!(Auth::guard()->check() || Auth::guard('admin')->check()))
                <ul class="navbar-nav ms-auto" style="height:0px; margin-right: 270px;">
                    @if (Route::has('login'))
                    <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                </ul>
                @endif -->

            </div>
        </div>
    </nav>
    <main>
        @yield("content")
    </main>

    <script>
        $(document).ready(function() {
            reStyle();
        });

        var width = $(window).width();
        $(window).on('resize', function() {
            reStyle();
        });

        function reStyle() {
            if ($('button.navbar-toggler').css("display") == "none") {
                $('#navbarSupportedContent ul').css('height', 0);
            } else {
                $('#navbarSupportedContent ul').css('height', 'auto');
            }
        }
    </script>
</body>

</html>