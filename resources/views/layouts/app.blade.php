<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        .custom-text li a {
            color: #fff;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: #1977cc;color:#fff">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    Za Bu Hein
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @if (Auth::check())
                        @if (Auth::user()->id == 1 || Auth::user()->id == 2)
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto navmenu custom-text">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Master
                                    </a>

                                    <ul class="dropdown-menu" style="background: #1977cc;">
                                        <li>
                                            <a class="nav-link" href="{{ url('admin/township/list') }}">Townships</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('admin/position/list') }}">Positions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('admin/duty/list') }}">Duty</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/admin/nurse/list') }}">
                                        Nurse
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/admin/patient/list') }}">
                                        Patient
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/admin/owner/list') }}">
                                        Owner
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/admin/ndp/list') }}">
                                        NDP
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/admin/booking/list') }}">
                                        Booking
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/admin/method/list') }}">
                                        Method
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ url('/admin/payment/list') }}">
                                        Payment
                                    </a>
                                </li>
                        @endif
                    @endif
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto custom-text">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" style="background: #1977cc;">
                                    <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
