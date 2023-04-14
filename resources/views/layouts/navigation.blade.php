<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-image: url('/img/extra/header_image_2.png'); background-color: #1D1D1D; background-size: 420px; background-repeat:no-repeat; background-position: right;">
        <div class="container" style="margin-left: 50px">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('/img/extra/logo.png') }}" alt="Monster Hunter World" width="200">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ ('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" style="height:0px;">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ Request::is('directory') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/directory') }}">Directory</a>
                    </li>
                    <li class="nav-item {{ Request::is('posts') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/posts') }}">Posts</a>
                    </li>


                    <?php
                    // $superUserMacAddress = ['00-50-56-C0-00-08'];
                    // $clientMacAddress = strtok(exec('getmac'), ' ');
                    // if (in_array($clientMacAddress, $superUserMacAddress)) { ?>
                    
                    <!-- <li class="nav-item {{ Request::is('authorize') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/authorize') }}">Authorize</a>
                    </li> -->
                    <?php
                    //}
                    
                    ?>
                    @if(Auth::guard('admin')->check())
                    <li class="nav-item {{ Request::is('authorize') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/authorize') }}">Authorize</a>
                    </li>

                    @endif

                </ul>

                <ul class="navbar-nav ms-auto" style="height:0px; margin-right: 270px;">
                    @if(Auth::guard()->check() || Auth::guard('admin')->check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(Auth::guard('admin')->check())
                            {{ Auth::guard('admin')->user()->name }}
                            @else
                            {{ Auth::user()->name}}
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif
                </ul>

                @if(!(Auth::guard()->check() || Auth::guard('admin')->check()))
                <ul class="navbar-nav ms-auto" style="height:150px; margin-right: 270px;">
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
                @endif

            </div>
        </div>
    </nav>
    <main>
        @yield("content")
    </main>
</body>

<style>
    a.nav-link {
        padding: 14px;
        border-bottom: 1.5px solid transparent;
        /* color: #ab9002; */
        position: relative;
        font-size: 20px;
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

    a.nav-link:hover::after {
        transform: scaleX(1);
    }

    a.nav-link:hover,
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

</html>
