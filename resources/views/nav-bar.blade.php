<div class="header" id="hero">
    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">classicsoftware@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div>
</div>
<header id="header" class="header sticky-top shadow-sm">
    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                {{-- <img src="../assets/img/zabuhein.jpg" alt="Hi"> --}}
                <img src="{{ asset('/images/zabuhein.jpg') }}" alt="Hi">
                <h1 class="sitename">Za Bu Hein</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}#hero" class="active">Home</a></li>
                    <li><a href="{{ url('/') }}#about">About</a></li>
                    <li><a href="{{ url('/') }}#services">Services</a></li>
                    <li><a href="{{ url('/') }}#doctors">Nurses</a></li>
                    <li><a href="{{ url('/') }}#contact">Contact</a></li>
                    <li class="d-xl-none"><a href="{{ url('/appointment') }}">Make a Booking</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>


        </div>

    </div>

</header>
