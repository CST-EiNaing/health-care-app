<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Za Bu Hein</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('images/zabuhein.jpg') }}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

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
    <header id="header" class="header sticky-top">
        {{-- <div class="topbar d-flex align-items-center">
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
    </div><!-- End Top Bar --> --}}
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
                        <li><a href="#hero" class="active">Home<br></a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#doctors">Nurses</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li class=" d-xl-none"><a href="{{ url('/appointment') }}">Make a Booking</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <a class="cta-btn d-xl-block d-none" href="{{ url('/appointment') }}">Make a Booking</a>

            </div>

        </div>

    </header>

    <main class=" main">
        <!-- Hero Section -->
        <section id="hero" class="hero section light-background">

            <img src="../assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

            <div class="container position-relative">

                <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
                    <h2>WELCOME TO Za Bu Hein</h2>
                    <p>We are support you for your health care</p>
                </div><!-- End Welcome -->

                <div class="content row gy-4">

                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="row gy-4">

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                        <i class="bi bi-clipboard-data"></i>
                                        <h4>Promotion</h4>
                                        <p>
                                            (၃) လ နှင့် အထက် ဝန်ဆောင်မှုယူလိုသူများအတွက်
                                            အထူးနှုန်းထားဖြင့် ဆောင်ရွက်ပေးပါတယ်။
                                        </p>
                                    </div>
                                </div><!-- End Icon Box -->

                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                        <i class="bi bi-gem"></i>
                                        <h4>Life Time</h4>
                                        <p>
                                            လူနာများအတွက် Service Fee တစ်ကြိမ်သွင်းထားယုံ နဲ့
                                            တစ်သက်တာ ဝန်ဆောင်မှု ပေးသွားမှာ ဖြစ်ပါတယ်။
                                        </p>
                                    </div>
                                </div><!-- End Icon Box -->


                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box" data-aos="zoom-out" data-aos-delay="500">
                                        <i class="bi bi-inboxes"></i>
                                        <h4>Discount</h4>
                                        <p>
                                            ယခုအသုံးပြုနေသော website မှတဆင့်
                                            Booking တင်ပြီး ဝန်ဆောင်မှု ရယူပါက
                                            5% Discount ရရှိမှာ ဖြစ်ပါတယ်။
                                        </p>
                                    </div>
                                </div><!-- End Icon Box -->

                            </div>
                        </div>
                    </div>
                </div><!-- End  Content-->

            </div>

        </section><!-- /Hero Section -->

        <!-- Knowledge Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4 gx-5">


                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                        <h3>လေဖြတ်ထားသော လူနာများအတွက်</h3>
                        <p>
                        <ul>
                            <li>နည်းစနစ်ကျစွာဖြင့် အစာကျွေးခြင်း။</li>
                            <li>အဟာရမျှတစေရန်အတွက် တွက်ချက်ပေးခြင်း။</li>
                            <li>လူနာအတွက် ပြုလုပ်ရမည့် လုပ်ငန်းစဉ်များ ဆောင်ရွက်ပေးခြင်း။</li>
                            <li>လေ့ကျင့်ခန်း ပုံမှန် လုပ်ပေးခြင်း။</li>
                            <p>တို့ကြောင့်

                                လူနာရဲ့ ရောဂါ အခြေအနေ
                                အချိန်တိုအတွင်း တိုးတတ်ကောင်းမွန်လာစေမှာ ဖြစ်ပါတယ်။
                            </p>
                        </ul>
                        </p>

                    </div>
                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                        <h3>ကလေးငယ်များ အတွက်</h3>
                        <p>
                        <ul>
                            <li>သန့်ရှင်းရေး ပြုလုပ်ပေးခြင်း။</li>
                            <li>ရေချိုးပေးခြင်း။</li>
                            <li>နို့ဗူးဖျော်ပေးခြင်း၊ နို့တိုက်ပေးခြင်း။</li>
                            <li>ဖြည့်စွက်စာ ပြင်ဆင်ပေးခြင်း။</li>
                            <li>ဆေးတိုက်ပေးခြင်း။</li>
                            <li>ကလေးနဲ့အတူ စိတ်ရှည်စွာ ဆော့ကစားပေးခြင်း။</li>
                            <li>ကလေးရဲ့ ကိုယ်ခန္ဒာ နှင့် စိတ်ကျန်းမာရေး အခြေခံသဘောတရားများကို
                                နားလည်ပြီး ပြုစုစောင့်ရှောက်ပေးတတ်ခြင်း။</li>
                            <li>မေမေတို့ ကလေးမီးဖွားပြီးချိန်တွင် ဖြစ်တတ်သော အရေးပေါ် အသက်ကယ်နည်းများကို
                                နားလည် ကျွမ်းကျင်သူများကိုယ်တိုင် ပြုစုစောင့်ရှောက်ပေးမှာဖြစ်လို့ စိတ်ချလိုက်ပါ။</li>

                        </ul>
                        </p>

                    </div>


                </div>
                <h4 class="d-flex justify-content-center fw-bold">စိတ်ကျေနပ်မှု ပြည့်ဝဖို့ Za Bu Hein နဲ့ လက်တွဲစို့
                </h4>

            </div>

        </section>
        <!-- /Knowledge Section -->


        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4 gx-5">

                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                        <img src="../assets/img/about.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <h3>Za Bu Hein ဆိုတာ ဘာလဲ ?</h3>
                        <p>
                            Za Bu Hein ဆိုတာ ကုမ္ပဏီနာမည် တစ်ခု ဖြစ်ပါတယ်။ ဒီ ကုမ္ပဏီမှာ
                            လူကြီးမင်းတို့၏ ချစ်လှစွာသော ကလေး၊ လူနာ၊ သက်ကြီးရွယ်အိုများအတွက်
                            ဘေးကင်းလုံခြုံမှု နဲ့ ကိုယ်ရော စိတ်ပါ ကျန်းမာရေး တိုးတတ်ကောင်းမွန်မှုကို
                            အဓိကထားပြီး Degree / Certificate လက်မှတ်ရ ကျွမ်းကျင်ဝန်ထမ်းများကိုယ်တိုင်
                            စနစ်တကျ ဝန်ဆောင်မှုပေးနေသော ကုမ္ပဏီဖြစ်ပါတယ်
                        </p>
                        <ul>
                            <li>
                                <i class="fa-solid fa-vial-circle-check"></i>
                                <div>
                                    <h5>သူနာပြု ဝန်ဆောင်မှု လုပ်ငန်း</h5>
                                    <p>
                                        ဒါ့အပြင် လူကြီးမင်းတို့၏
                                        အထူးကု ဆေးရုံကြီးများ၊
                                        အထူးကု ဆေးခန်းများ နှင့် ဆေးဆိုင်များအတွက်
                                        ကျွမ်းကျင်သွက်လက်တဲ့ သူနာပြု (ရာထူးမျိုးစုံ) များကို
                                        အချိန်ပိုင်း၊ အချိန်ပြည့် ငှားရမ်းအသုံးပြုနိုင်ပါတယ်။
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-pump-medical"></i>
                                <div>
                                    <h5>သူနာပြု အကူ သင်တန်းကျောင်း</h5>
                                    <p>သူနာပြု အကူသင်တန်း တတ်ရောက်လိုသော
                                        ညီငယ်၊ ညီမငယ်များအတွက် လစဉ်တန်းခွဲများ
                                        ဖွင့်လှစ်သင်ကြားပေးနေပါတယ်။
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="fa-solid fa-heart-circle-xmark"></i>
                                <div>
                                    <h5>ဆေးဝါး အကူ သင်တန်းကျောင်း</h5>
                                    <p>
                                        ဆေးဝါးကျွမ်းကျင် ဖြစ်လိုသူများ၊
                                        ဆေးဆိုင် ဖွင့်လိုသော သူများအတွက်
                                        ဆေးဝါး အကူ သင်တန်းကျောင်းကိုလည်း
                                        လစဉ်တန်းခွဲများ ဖွင့်လှစ်သင်ကြားပေးနေပါတယ်
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Fees Section -->
        <section id="services" class="services section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Za Bu Hein ရဲ့ ကျန်းမာရေး ဝန်ဆောင်မှု (Daily) နှုန်းထားများ</h2>
                <h5>Health Care Assistant (HCA) = 15000MMK</h5>
                <h5>Care Giver (CGV) = 18000MMK</h5>
                <h5>Auxilliary Midwives (AMV) = 20000MMK</h5>
                <h5>Special Nurse = 40000MMK</h5>
            </div><!-- End Section Title -->
        </section><!-- /Fees Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item  position-relative">
                            <div class="icon">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Health Care Assistant</h3>
                            </a>
                            <p>
                                သက်ကြီးရွယ်အိုများ သို့မဟုတ် မကျန်းမမာဖြစ်နေသူများကို
                                ၎င်းတို့၏အိမ်များတွင် ဘေးကင်းစွာနေထိုင်ရန် ကူညီပေးသည်။
                            </p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-pills"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Care Giver</h3>
                            </a>
                            <p>
                                သက်ကြီးရွယ်အိုများ ကလေးများ နာတာရှည်ဖျားနား ဖြစ်နေသူများ
                                အော်တစ်ဇင် (Autism)
                                အယ်ဇိုင်းမား (Alzheimer) ခံစားနေရသူများကို
                                အထူးစောင့်ရှောက်ပေးသည်။
                            </p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-hospital-user"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Auxiliary Midwives (AMWs)</h3>
                            </a>
                            <p>ကိုယ်ဝန်ဆောင် မိခင်များနှင့် မွေးကင်းစ ကလေးများ
                                အထူးသီးသန့် ပြုစုစောင့်ရှောက်ပေးသည်။
                            </p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-dna"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Special Nurse</h3>
                            </a>
                            <p>ဆရာဝန် ညွှန်ကြားမှုဖြင့်
                                ဆေးထိုးခြင်း၊ ဆေးသွင်းခြင်း
                                Drip ချိတ်ခြင်း၊ နှာခေါင်းပိုက်၊ ဆီးပိုက်ထည့်ခြင်း
                                များကို ကူညီဆောင်ရွက်ပေးသည်။</p>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-hospital-user"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Hospital</h3>
                            </a>
                            <p>မိမိတို့ ဆေးရုံအတွက်
                                ကျွမ်းကျင်သွက်လက်သော
                                သူနာပြု အကူများနှင့်
                                Special Nurses များကို
                                ငှားရမ်းအသုံးပြုနိုင်ပါသည်။</p>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-hospital-user"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Clinic</h3>
                            </a>
                            <p>မိမိတို့ ဆေးဆိုင်၊ ဆေးခန်း များအတွက်
                                ကျွမ်းကျင်သွက်လက်သော
                                သူနာပြု အကူများနှင့်
                                Special Nurses များအပြင်
                                Pharmacy ကျွမ်းကျင်ဝန်ထမ်းများကို
                                ငှားရမ်းအသုံးပြုနိုင်ပါသည်။</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- NurseRent Section -->
        <section id="services" class="about section">

            <div class="container">

                <div class="row gy-4 gx-5">


                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                        <h3 class="fw-bold">သူနာပြုအကူ ငှားရမ်းခြင်းရဲ့ အကျိုးကျေးဇူးများ</h3>
                        <p>
                        <ul>
                            <li>မိမိတို့၏ အဘိုးအဖွားများကို ဘေးကင်းလုံခြုံစွာနဲ့ စောင့်ရှောက်မှုကို အပြည့်အဝ
                                ရရှိစေခြင်း။
                            </li>
                            <li>မိမိတို့၏ စီးပွားရေးလုပ်ငန်းများကို စိတ်ဖြောင့်ဖြောင့် နဲ့ လုပ်နိုင်ခြင်း။</li>
                            <li>ဘေဘီ ကလေးများကို ဆရာမနှင့် ထားခြင်းဖြင့် မိမိတို့ရဲ့ ချစ်ခင်ရသော
                                ခင်ပွန်း၊ ဇနီး၊ မိဘများ နှင့် အပေါင်းအသင်း မိတ်ဆွေများအတွက် အချိန်ခွဲဝေပေးနိုင်ခြင်း။
                            </li>
                            <li>မိမိတို့၏ အော်တစ်ဇင် (Autism) ကလေးများကို နည်းစနစ်တကျဖြင့် ပြုစုစောင့်မှုကို
                                ပေးနိုင်ခြင်း။</li>
                            <li>သက်ကြီးရွယ်အို နှင့် လေဖြတ် လူနာများကို ပြုစုစောင့်ရှောက်မှု ပေးနိုင်ခြင်း။</li>
                            <li>ဆရာဝန် ညွှန်ကြားသည့်အတိုင်း စနစ်တကျ ဆေးသွင်း၊ ဆေးချိတ်၊ ဆေးတိုက်ခြင်းများကို
                                အချိန်မှန်လုပ်ဆောင်ပေးနိုင်ခြင်း။</li>

                        </ul>
                        </p>


                    </div>
                    <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="200">
                        <img src="../assets/img/doctors/nurse.webp" class="img-fluid" alt="">
                    </div>

                </div>
                <div class=" mt-4">
                    <p class="d-flex justify-content-center fw-bold">လက်ရှိ ဖြစ်ပေါ်နေသော ကျန်းမာရေး နှင့် ပတ်သတ်သည့်
                        သတင်းအချက်အလက်များကို Up to Date ဖတ်ရှုနိုင်ရန်
                    </p>
                    <p class="d-flex justify-content-center fw-bold"> <a href="https://www.google.com/"
                            target="_blank">Za
                            Bu
                            Hein Facebook
                            Page</a> &nbsp;ကို &nbsp; <span class="text-primary"> Like & Follow </span>
                        &nbsp;လုပ်ထားကြဖို့
                        မမေ့နဲ့နော်။
                    </p>
                    <p class="d-flex justify-content-center fw-bold">ကြိုတင်ဆွေးနွေးတိုင်ပင်စရာများ၊
                        ပွင့်ပွင့်လင်းလင်း မေးမြန်းစုံစမ်းချင်တာများကို
                        အားနာစရာမလိုပဲ
                    </p>
                    <p class="d-flex justify-content-center fw-bold"> <a href="https://www.google.com/"
                            target="_blank">Za
                            Bu
                            Hein Facebook Messenger</a> &nbsp;မှ တစ်ဆင့်
                        အခမဲ့ တိုင်ပင်ဆွေးနွေး မေးမြန်းနိုင်ပါသည်။
                    </p>
                </div>
            </div>

        </section>
        <!-- /NurseRent Section -->

        <!-- Doctors Section -->
        <section id="doctors" class="doctors section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Our Nurses</h2>
                <h4 class="d-flex mb-4 justify-content-center fw-bold">နှစ်သက်ရာ သူနာပြုများကို ရွေးချယ်
                    ခေါ်ယူနိုင်ပါသည်။
                </h4>
                <div class="form-group row">
                    <label for="nurse-type" class="col-form-label col-md-6" style="text-align:right;">
                        <p><strong>Select Nurse Location:</strong></p>
                    </label>
                    <div class="col-md-6">
                        <select id="township" name="township_id" class="form-control"
                            onchange="handleTownshipChange()">
                            @foreach ($townships as $township)
                                <option value="{{ $township->id }}">{{ $township->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div><!-- End Section Title -->
            <div class="container">
                <div class="row gy-4" id="nurse-container"
                    style="height: 638px; scroll-behavior: smooth; overflow: scroll;"
                    >
                </div>
            </div>

        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="gallery section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
            </div><!-- End Section Title -->

            <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-0">

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="../assets/img/gallery/gallery-1.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="../assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="../assets/img/gallery/gallery-2.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="../assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="../assets/img/gallery/gallery-3.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="../assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="../assets/img/gallery/gallery-4.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="../assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="../assets/img/gallery/gallery-5.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="../assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="../assets/img/gallery/gallery-6.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="../assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="../assets/img/gallery/gallery-7.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="../assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="../assets/img/gallery/gallery-8.jpg" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="../assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div><!-- End Gallery Item -->

                </div>

            </div>

        </section><!-- /Gallery Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <h5>စိတ်ကျေနပ်မှု ပြည့်ဝဖို့ Za Bu Hein နဲ့ လက်တွဲစို့</h5>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row">
                    <!-- First Column: Locations -->
                    <div class="col-md-4">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt"></i> <!-- Icon and Text aligned using flex -->
                            <h3>Location</h3>
                        </div>
                        <p>Yangon</p>
                        <p>Mandalay</p>
                        <p>Nay Pyi Taw</p>
                    </div><!-- End Location Column -->

                    <!-- Second Column: Call Us -->
                    <div class="col-md-4">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone me-2"></i> <!-- Icon and Text aligned using flex -->
                            <h3>Call Us</h3>
                        </div>
                        <p>+1 5589 55488 55 (Yangon)</p>
                        <p>+1 5589 55488 66 (Mandalay)</p>
                        <p>+1 5589 55488 77 (Nay Pyi Taw)</p>
                    </div><!-- End Call Us Column -->

                    <!-- Third Column: Email Us -->
                    <div class="col-md-4">
                        <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope me-2"></i> <!-- Icon and Text aligned using flex -->
                            <h3>Email Us</h3>
                        </div>
                        <p>yangon@example.com</p>
                        <p>mandalay@example.com</p>
                        <p>naypyitaw@example.com</p>
                    </div><!-- End Email Us Column -->
                </div>
            </div>
        </section><!-- /Contact Section -->
    </main>
    @include('footer')
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Preloader -->
    <div id="preloader"></div>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>
<script>
    function handleTownshipChange() {
        let selectedTownshipId = parseInt(document.getElementById('township').value, 10);
        
        let nurseLists = @json($nurses); // Data from Laravel controller
        let defaultImageUrl = "{{ asset('images/nurses/default.jpg') }}"; // Default image if no photo

        // Filter nurses based on the selected township
        let nurseByTownship = nurseLists.filter(data => data.township_id === selectedTownshipId);

        // Get the container for nurse cards
        const nurseContainer = document.getElementById('nurse-container');
        nurseContainer.innerHTML = ''; // Clear existing nurse cards

        // Loop through each filtered nurse and generate the card
        nurseByTownship.forEach((nurse, index) => {
            const nurseCard = document.createElement('div');
            nurseCard.className = 'col-lg-6';
            nurseCard.setAttribute('data-aos', 'fade-up');
            nurseCard.setAttribute('data-aos-delay', (index + 1) * 100);

            // Dynamic image handling (either photo or default image)
            let nurseImage = nurse.photo ? "{{ asset('images/nurses') }}/" + nurse.photo : defaultImageUrl;

            // HTML structure for nurse card
            nurseCard.innerHTML = `
           <div class="team-member">
               <div class=" d-flex align-items-start mb-2">
                   <div class="pic">
                       <img src="${nurseImage}" alt="${nurse.name}" class="img-fluid">
                   </div>
                   <div class="member-info">
                       <h4>${nurse.name}</h4>
                       <span></span>
   
                       <div class="info-pair d-flex align-items-center gap-3 mb-2">
                           <p style="width: 120px" class=' border-end'><strong>Age: </strong>${nurse.age || 'Not provided'}</p> 
                           <p><strong>Township: </strong>${nurse.township.name || 'Not provided'}</p>
                       </div>
   
                       <div class="info-pair d-flex align-items-center gap-3 mb-2">
                           <p style="width: 120px"  class=' border-end'><strong>Education: </strong>${nurse.education || 'B.A'}</p>
                           <p><strong>Position: </strong>${nurse.position || 'HCA'}</p>
                       </div>
   
                       <div class="info-pair d-flex align-items-center gap-3 mb-2">
                           <p style="width: 120px" class=' border-end'><strong>Height: </strong>${nurse.height || 'Not provided'}cm</p>
                           <p><strong>Weight: </strong>${nurse.weight || 'Not provided'}Kg</p>
                       </div>
   
                       <div class="info-pair d-flex align-items-center gap-3 mb-2">
                           <p style="width: 120px" class=' border-end'><strong>Reli: </strong>${nurse.religion || 'Not provided'}</p>
                           <p><strong>Status: </strong>${nurse.maritial_status || 'Not provided'}</p>
                       </div>
                   </div>
               </div>
               <div class=' experience mb-2'>
                   <p style='color: red; display: inline'>*</p> 
                   လုပ်ငန်း အတွေ့အကြုံ <strong>နှစ်နှစ်</strong> နှင့် အထက် ရှိသူများသာ ဖြစ်သည်။ 
                   <p style='color: red; display: inline'>*</p>
               </div>
           </div>
               
           `;

            // Append the generated card to the container
            nurseContainer.appendChild(nurseCard);
        });
    }
    // Run the function on page load and when township selection changes
    document.addEventListener("DOMContentLoaded", function() {
        handleTownshipChange(); // Initial load
        document.getElementById('township').addEventListener('change',
            handleTownshipChange); // Update on change
    });
</script>
