<!Doctype html>
<html lang="en">
<head>
    <link rel="icon" href="{{ asset('assets/frontend/images/all-img/favicon.png') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@stack('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap-v4.1.3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animations.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/reponsive.css') }}">
    <!--====== AJAX ======-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<!--header-part-->
<div class="topnav">
    <header class="bg-color">
        <div class="container top-bar">
            <ul class="top-content">
                <li><i class="fas fa-envelope icon"></i>datatechbdltd@gmail.com</li>
                <li><i class="fas fa-phone-volume icon"></i>+880 1304-734623</li>
            </ul>
            <ul class="top-content float-right">
                <li><a href="#">Track</a></li>
                @if(auth()->check())
                <li><a href="{{ route('login') }}">My Panel</a></li>
                @else
                <li><a href="javascript:0" data-toggle="modal" data-target="#login">Login</a></li>
                @endif
            </ul>
        </div>
        @guest
        <div class="modal fade" id="login">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 login-img">
                                <img src="{{ asset('assets/frontend/images/all-img/login-side.png') }}" alt="img">
                            </div>
                            <div class="col-lg-6">
                                <div class="well">
                                    <form id="loginForm" action="{{ route('login') }}" method="post">
                                        @csrf
                                        <h3>Login</h3>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email"
                                                   placeholder="Enter Phone Or Email Or Username" value="{{ old('email') }}"/>
                                            <span class="help-block"></span>
                                            @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Password" name="password" id="password" class="form-control input-field" type="password"/>
                                            <span class="fas fa-eye code field-icon"></span>
                                            @error('password')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 login-btn">
                                            <a href="javascript:0" onclick="document.getElementById('loginForm').submit()" class="btn btn-default btn-block">Login</a>
                                        </div>
                                        <p class="help-block">Forget You Password | <a href="#" class="sign-up">Sign
                                                up</a></p>
                                        <div class="title-section center">
                                            <h2><span>OR</span></h2>
                                        </div>
                                        <p class="text-center">Login With Your Social Media Account</p>
                                        <ul>
                                            <li><a href="#" class="btn-block google"><i
                                                        class="fab fa-google-plus-g icon"></i> GOOGLE</a></li>
                                            <li><a href="#" class="btn-block facebook"><i
                                                        class="fab fa-facebook-f icon"></i> FACEBOOK</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endguest
    </header>
</div>

<!-- mobile-sidemenu -->
<div class="row nav-menu">
    <div class="container mob-sidebar">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="crbnMenu">
                <ul class="menu">
                    <li><a class="nav-link" href="#"><span>Home</span> <span class="menu-toggle"><i
                                    class="fas fa-angle-down" aria-hidden="true"></i></span></a>
                        <ul class="drop-link">
                            <li>
                                <a href="javascript:0">Home One</a>
                            </li>
                            <li>
                                <a href="javascript:0">Home Two</a>
                            </li>
                            <li>
                                <a href="javascript:0">Home Three</a>
                            </li>
                        </ul>
                    </li>
                    @if(auth()->check())
                        <li><a href="{{ route('login') }}">My Panel</a></li>
                    @else
                        <li><a href="javascript:0" data-toggle="modal" data-target="#login">Login</a></li>
                    @endif
                    <li>
                        <a class="nav-link" href="#"><span>Services</span> <span class="menu-toggle"><i
                                    class="fas fa-angle-down" aria-hidden="true"></i></span></a>
                        <ul class="drop-link">
                            <li>
                                <a href="javascript:0">Service</a>
                            </li>
                            <li>
                                <a href="javascript:0">Service Details</a>
                            </li>
                            <li>
                                <a href="javascript:0">Tracking</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="nav-link" href="#"><span>Blogs</span> <span class="menu-toggle"><i
                                    class="fas fa-angle-down" aria-hidden="true"></i></span></a>
                        <ul class="drop-link">
                            <li>
                                <a href="javascript:0">Blog</a>
                            </li>
                            <li>
                                <a href="javascript:0">Blog Details</a>
                            </li>
                            <li>
                                <a href="javascript:0">Blog Leftsidebar</a>
                            </li>
                            <li>
                                <a href="javascript:0">Blog Full Width</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="nav-link" href="javascript:0"><span>Location</span> </a></li>
                    <li><a class="nav-link" href="javascript:0"><span>Contact</span> </a></li>
                </ul>
            </div>
        </div>
        <span class="side-btn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        <a class="navbar-brand pb-2" href="javascript:0"> <img src="{{ asset('assets/frontend/images/all-img/logo.png') }}" alt="logo_img"> </a>
    </div>
</div>
<!-- mobile-sidemenu -->

<!-- desktop-menu -->
<div class="row first-menu navbar-dark bg-dark">
    <div class="container">
        <nav class="navbar navbar-expand-sm offcanvas-desktop">
            <div class="col-md-3 ">
                <a class="navbar-brand pb-2" href="javascript:0"> <img src="{{ asset('assets/frontend/images/all-img/logo.png') }}" alt="logo_img"> </a>
            </div>
            <div class="col-md-9 collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown dropdown-slide dropdown-hover"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" data-toggle="dropdown"
                                                                                    aria-haspopup="true" aria-expanded="false"> Home </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="javascript:0">Home One</a>
                            <a class="dropdown-item" href="javascript:0">Home Two</a>
                            <a class="dropdown-item" href="javascript:0">Home Three</a>
                        </div>
                    </li>
                    @if(auth()->check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">My Panel</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="javascript:0" data-toggle="modal" data-target="#login">Login</a></li>
                    @endif
                    <li class="nav-item dropdown dropdown-slide dropdown-hover">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Service
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="javascript:0">Service</a>
                            <a class="dropdown-item" href="javascript:0">Service Detail</a>
                            <a class="dropdown-item" href="javascript:0">Tracking</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="javascript:0">Contact</a></li>
                </ul>
                <div class="search-container">
                    <form>
                        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                        <input type="text" name="search">
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- desktop-menu -->

<!-- home-slider -->
<section id="mainSlider">
    <div id="owl-main" class="owl-carousel">
        <div class="item">
            <img src="{{ asset('assets/frontend/images/home-slider/slide-1.jpg') }}" alt="logo_img" class="img-fluid">
            <div class="container">
                <div class="carousel-caption vertical-top text-left">
                    <h4 class="animate" data-anim-type="fadeInDown" data-anim-delay="600">সহজ এবং নিখুঁত সমাধান</h4>
                    <h1 class="animate" data-anim-type="fadeInDown" data-anim-delay="600">ট্রান্সপোর্ট এজেন্সি<br><span>ম্যানেজমেন্ট সফটওয়্যার</span>
                    </h1>
                    <p class="animate" data-anim-type="fadeInUp" data-anim-delay="600">The clean code allows you to
                        easily copy code blocks from content <br>modules and past
                        them in different places or layouts.</p>
                    <div class="fadeInRight-3">
                        <a href="#" class="btn btn-large animate" data-anim-type="fadeInUp" data-anim-delay="600">Learn
                            More <i class="fas fa-angle-double-right icon"></i></a>
                        <a href="#" class="btn btn-large btn-2 animate" data-anim-type="fadeInUp" data-anim-delay="600">Watch
                            video <i class="fab fa-youtube icon"></i></a>
                    </div>
                </div><!-- /.caption -->
            </div><!-- /.container -->
        </div><!-- /.item -->

        <div class="item">
            <img src="{{ asset('assets/frontend/images/home-slider/slide-2.jpg') }}" alt="logo_img" class="img-fluid">
            <div class="container">
                <div class="carousel-caption vertical-top text-center">
                    <h4 class="animate" data-anim-type="fadeInDown" data-anim-delay="500">সহজ এবং নিখুঁত সমাধান</h4>
                    <h1 class="animate" data-anim-type="fadeInDown" data-anim-delay="500">ট্রান্সপোর্ট এজেন্সি<br><span>ম্যানেজমেন্ট সফটওয়্যার</span>
                    </h1>
                    <p class="animate" data-anim-type="fadeInUp" data-anim-delay="500">The clean code allows you to
                        easily copy code blocks from content <br>modules and past
                        them in different places or layouts.</p>
                    <div class="fadeInRight-3">
                        <a href="#" class="btn btn-large animate" data-anim-type="fadeInUp" data-anim-delay="600">Learn
                            More <i class="fas fa-angle-double-right icon"></i></a>
                        <a href="#" class="btn btn-large btn-2 animate" data-anim-type="fadeInUp" data-anim-delay="600">Watch
                            video <i class="fab fa-youtube icon"></i></a>
                    </div>
                </div><!-- /.caption -->
            </div><!-- /.container -->
        </div><!-- /.item -->

        <div class="item">
            <img src="{{ asset('assets/frontend/images/home-slider/slide-3.jpg') }}" alt="logo_img" class="img-fluid">
            <div class="container">
                <div class="carousel-caption vertical-top text-right">
                    <h4 class="animate" data-anim-type="fadeInDown" data-anim-delay="600">সহজ এবং নিখুঁত সমাধান</h4>
                    <h1 class="animate" data-anim-type="fadeInDown" data-anim-delay="600">ট্রান্সপোর্ট এজেন্সি<br><span>ম্যানেজমেন্ট সফটওয়্যার</span>
                    </h1>
                    <p class="animate" data-anim-type="fadeInUp" data-anim-delay="600">The clean code allows you to
                        easily copy code blocks from content <br>modules and past
                        them in different places or layouts.</p>
                    <div class="fadeInRight-3">
                        <a href="#" class="btn btn-large animate" data-anim-type="fadeInUp" data-anim-delay="600">Learn
                            More <i class="fas fa-angle-double-right icon"></i></a>
                        <a href="#" class="btn btn-large btn-2 animate" data-anim-type="fadeInUp" data-anim-delay="600">Watch
                            video <i class="fab fa-youtube icon"></i></a>
                    </div>
                </div><!-- /.caption -->
            </div><!-- /.container -->
        </div><!-- /.item -->
    </div><!-- /.owl-carousel -->
</section>

<!--faq section-->
<section class="row faq-section" id="faq">
    <div class="col-lg-6 col-md-12 faq-desc bg-color">
        <div class="title-section t-border pb-60">
            <h2>FAQ'S</h2>
            <p class="title-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing </p>
        </div>
        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="headingOne1">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                       aria-controls="collapseOne1">
                        <h5 class="mb-0"> How it work ?</h5>
                    </a>
                </div>
                <!-- Card body -->
                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                     data-parent="#accordionEx">
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi. Duis
                            rhoncus imperdiet tortor eu sodales</p>
                    </div>
                </div>
            </div>
            <!-- Accordion card -->

            <!-- Accordion card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo2">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                       aria-expanded="false" aria-controls="collapseTwo2">
                        <h5 class="mb-0">
                            There are many variations of passage ?</h5>
                    </a>
                </div>
                <!-- Card body -->
                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                     data-parent="#accordionEx">
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi. Duis
                            rhoncus imperdiet tortor eu sodales</p>
                    </div>
                </div>
            </div>
            <!-- Accordion card -->

            <!-- Accordion card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header" role="tab" id="headingThree3">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                       aria-expanded="false" aria-controls="collapseThree3">
                        <h5 class="mb-0">Warehosing solutions</h5>
                    </a>
                </div>
                <!-- Card body -->
                <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                     data-parent="#accordionEx">
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi. Duis
                            rhoncus imperdiet tortor eu sodales Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Aenean nec sagittis nisi. Duis rhoncus imperdiet tortor eu sodales</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 faq-details">
        <form id="companyRegistrationForm" action="{{ route('frontend.companyRegistration') }}" method="post">
            @csrf
            <div class="service-form">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 faq-section-title center pb-60">
                        <h2>ট্রান্সপোর্ট এজেন্সি সফটওয়্যারে </h2>
                        <h3><span>আপনার কোম্পানি একাউন্ট খুলুন</span></h3>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group service-form-group">
                            <label class="control-label sr-only" for="company_name"></label>
                            <input id="company_name" name="company_name" type="text" placeholder="আপনার কোম্পানির নাম" title="আপনার কোম্পানির নাম" class="form-control" required>
                            @error('company_name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  ">
                        <div class="form-group service-form-group">
                            <label class="control-label sr-only" for="name"></label>
                            <input id="name" name="name" type="text" placeholder="আপনার পূর্ণাঙ্গ নাম" title="আপনার পূর্ণাঙ্গ নাম" class="form-control" required>
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group service-form-group">
                            <label class="control-label sr-only" for="phone"></label>
                            <input id="phone" name="phone" type="text" placeholder="আপনার মোবাইল নাম্বার" title="আপনার মোবাইল নাম্বার" class="form-control" required>
                            @error('phone')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                        <div class="form-group service-form-group">
                            <label class="control-label sr-only" for="email"></label>
                            <input id="email" name="email" type="email" placeholder="আপনার ইমেইল এড্রেস" title="আপনার ইমেইল এড্রেস" class="form-control" required>
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  ">
                        <div class="form-group service-form-group">
                            <label class="control-label sr-only" for="password"></label>
                            <input id="password" name="password" type="password" placeholder="একটি নতুন পাসপোর্ট লিখুন" title="একটি নতুন পাসপোর্ট লিখুন" class="form-control" required>
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  ">
                        <div class="form-group service-form-group">
                            <label class="control-label sr-only" for="password_confirmation"></label>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="পাসওয়ার্ডটি পুনরায় লিখুন"  title="পাসওয়ার্ডটি পুনরায় লিখুন" class="form-control" required>
                            @error('password_confirmation')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 submit-btn">
                        <button type="submit" style="cursor: pointer;" class="send-btn col-12"> সাবমিট </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--faq section-->

<!--shiping section-->
<section class="shiping-section space1" id="shiping">
    <div class="container">
        <div class="title-section center pb-60 animate" data-anim-type="fadeInLeft" data-anim-delay="900">
            <h2><span>Larges shiping worldwide</span></h2>
            <p class="title-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis
                nisi.Duis rhoncus imperdiet tortor eu sodales </p>
        </div>
    </div>
    <div class="swiper-container shipping-bg">
        <div class="swiper-container shiping-datas">
            <div class="swiper-container container swiper1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <figure class="col-md-12 shiping-desc">
                            <div class="img-thumbnail">
                                <img class="img-fluid" src="{{ asset('assets/frontend/images/home-shiping/img-1.jpg') }}" alt="shiping">
                            </div>
                            <figcaption class="shiping-detail">
                                <div class="shiping-data">
                                    <h3><a href="#">CARGO TRANSPORT</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis
                                        nisi. Duis rhoncus imperdiet tortor eu sodales. </p>
                                </div>
                                <div class="button"><a href="#" class="btn">Load More</a></div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="col-md-12 shiping-desc">
                            <div class="img-thumbnail">
                                <img class="img-fluid" src="{{ asset('assets/frontend/images/home-shiping/img-2.jpg') }}" alt="shiping">
                            </div>
                            <figcaption class="shiping-detail">
                                <div class="shiping-data">
                                    <h3><a href="#">CARGO TRANSPORT</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis
                                        nisi. Duis
                                        rhoncus imperdiet tortor eu sodales. </p>
                                </div>
                                <div class="button"><a href="#" class="btn">Load More</a></div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="col-md-12 shiping-desc">
                            <div class="img-thumbnail">
                                <img class="img-fluid" src="{{ asset('assets/frontend/images/home-shiping/img-3.jpg') }}" alt="shiping">
                            </div>
                            <figcaption class="shiping-detail">
                                <div class="shiping-data">
                                    <h3><a href="#">CARGO TRANSPORT</a></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis
                                        nisi. Duis
                                        rhoncus imperdiet tortor eu sodales. </p>
                                </div>
                                <div class="button"><a href="#" class="btn">Load More</a></div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-prev swiper-button-prev6"><i class="fas fa-angle-double-left"></i></div>
            <div class="swiper-button-next swiper-button-next6"><i class="fas fa-angle-double-right"></i></div>
        </div>
    </div>
</section>
<!--shiping section-->

<!--service section-->
<section class="service-section bg_anim_1 bg-color space" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="title-section t-border">
                    <h2>Service</h2>
                    <p class="title-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis
                        nisi. Duis rhoncus
                        imperdiet tortor eu sodales. Curabitur id fermentum quam. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Aenean nec sagittis nisi. Duis rhoncus imperdiet tortor eu sodales.
                        Curabitur id fermentum quam. Aenean nec sagittis nisi. Duis rhoncus imperdiet </p>
                </div>
                <ul class="list">
                    <li><i class="fas fa-check icon"></i> Lorem ipsum dolor sit amet, consectetur adipi</li>
                    <li><i class="fas fa-check icon"></i> Lorem ipsum dolor sit amet, consectetur adipi</li>
                    <li><i class="fas fa-check icon"></i> Lorem ipsum dolor sit amet, consectetur adipi</li>
                    <li><i class="fas fa-check icon"></i> Lorem ipsum dolor sit amet, consectetur adipi</li>
                </ul>
                <h3>You Want To Track your shipment</h3>
                <form name="myForm" method="get">
                    <input type="text" name="name" placeholder="Name">
                    <input type="tel" name="tel" placeholder="Phobe no.">
                    <input class="id" name="id" placeholder="Enter Track ID">
                    <input type="button" value="Track">
                </form>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="col-md-6">
                    <div class="col-md-12 service-desc">
                        <img class="img-fluid" src="{{ asset('assets/frontend/images/home-service/1.png') }}" alt="service">
                        <h3><a href="#">CARGO TRANSPORT</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 service-desc">
                        <img class="img-fluid" src="{{ asset('assets/frontend/images/home-service/2.png') }}" alt="service">
                        <h3><a href="#">CARGO TRANSPORT</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 service-desc">
                        <img class="img-fluid" src="{{ asset('assets/frontend/images/home-service/3.png') }}" alt="service">
                        <h3><a href="#">CARGO TRANSPORT</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi. </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 service-desc">
                        <img class="img-fluid" src="{{ asset('assets/frontend/images/home-service/4.png') }}" alt="service">
                        <h3><a href="#">CARGO TRANSPORT</a></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--service section-->

<!--choose section-->
<section class="row choose-section space" id="choose">
    <div class="container">
        <div class="title-section center pb-60">
            <h2><span>WHY CHOOSE US</span></h2>
            <p class="title-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi.
                Duis rhoncus
                imperdiet tortor eu sodales </p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-md-4 choose-desc">
                <ul>
                    <li class="pb-30"><h4> GOODS TRACKING SYSTEM </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </li>
                    <li class="pb-30"><h4> WORLDWIDE LOCATION </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </li>
                    <li class="pb-30"><h4> HUGE STORAGE</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </li>
                    <li><h4>DELIVERY IN TIME </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12 choose-desc second-div">

            </div>
            <div class="col-lg-4 col-md-6 choose-desc">
                <ul>
                    <li class="pb-30"><h4> GOODS TRACKING SYSTEM </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </li>
                    <li class="pb-30"><h4> WORLDWIDE LOCATION </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </li>
                    <li class="pb-30"><h4> HUGE STORAGE</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </li>
                    <li><h4>DELIVERY IN TIME </h4>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--choose section-->

<!--offer section-->
<section class=" offer-section space" id="offer">
    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
        <div class="title-section center pb-60">
            <h1>What Our Advantages</h1>
            <h2><span>WHAT WE OFFER</span></h2>
            <h4>BENIFITS FOR USERS</h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 choose-desc-new">
                    <ul>
                        <li>
                            <div class="item">
                                <div class="shape"></div>
                                <h4> 01 </h4>
                            </div>
                            <div class="content"><i class="fas fa-dollar-sign icon"></i>LOW COST</div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="shape"></div>
                                <h4> 02 </h4>
                            </div>
                            <div class="content"><i class="fab fa-youtube icon"></i>LOW COST</div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="shape"></div>
                                <h4> 03 </h4>
                            </div>
                            <div class="content"><i class="fab fa-youtube icon"></i>LOW COST</div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6  col-md-6 choose-desc-new">
                    <ul>
                        <li>
                            <div class="item">
                                <div class="shape"></div>
                                <h4> 04 </h4>
                            </div>
                            <div class="content"><i class="fas fa-dollar-sign icon"></i>LOW COST</div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="shape"></div>
                                <h4> 05 </h4>
                            </div>
                            <div class="content"><i class="fab fa-youtube icon"></i>LOW COST</div>
                        </li>
                        <li>
                            <div class="item">
                                <div class="shape"></div>
                                <h4> 06 </h4>
                            </div>
                            <div class="content"><i class="fab fa-youtube icon"></i>LOW COST</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--offer section-->

<!--pricing section-->
<section class="row pricing-section space" id="pricing">
    <div class="container">
        <div class="title-section center pb-60">
            <h2><span>PRICING PLAN</span></h2>
            <p class="title-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi.
                Duis rhoncus
                imperdiet tortor eu sodales </p>
        </div>
        <div class="row pricing-data">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="pricingTable bg-color">
                    <div class="col-md-12 table-head ">
                        <div class="table-bg">
                        </div>
                        <h3>$450</h3>
                    </div>
                    <div class="pricing-content">
                        <ul class="pricing-content">
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email Accounts</li>
                            <li><b>50GB</b> Bandwidth</li>
                            <li><b>10</b> Subdomains</li>
                            <li><b>15</b> Domains</li>
                        </ul>
                        <a href="#" class="pricingTable-signup">purchase</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="pricingTable bg-color">
                    <div class="col-md-12 table-head">
                        <div class="table-bg">
                        </div>
                        <h3>$600</h3>
                    </div>
                    <div class="pricing-content">
                        <ul class="pricing-content">
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email Accounts</li>
                            <li><b>50GB</b> Bandwidth</li>
                            <li><b>10</b> Subdomains</li>
                            <li><b>15</b> Domains</li>
                        </ul>
                        <a href="#" class="pricingTable-signup">purchase</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="pricingTable bg-color">
                    <div class="col-md-12 table-head">
                        <div class="table-bg">
                        </div>
                        <h3>$850</h3>
                    </div>
                    <div class="pricing-content">
                        <ul class="pricing-content">
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email Accounts</li>
                            <li><b>50GB</b> Bandwidth</li>
                            <li><b>10</b> Subdomains</li>
                            <li><b>15</b> Domains</li>
                        </ul>
                        <a href="#" class="pricingTable-signup">purchase</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--pricing section-->



<!--team section-->
<section class="row team-section space" id="team">
    <div class="container">
        <div class="title-section center pb-60">
            <h2><span>MEET OUR TEAM</span></h2>
            <p class="title-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi.
                Duis rhoncus
                imperdiet tortor eu sodales </p>
        </div>
        <div class="swiper-container team-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <figure class="figure team bg-color">
                        <div class="bg-pic">
                            <div class="pic">
                                <img src="{{ asset('assets/frontend/images/home-team/client-1.jpg') }}" alt="service">
                            </div>
                        </div>
                        <figcaption class="text-center">
                            <div class="team-content">
                                <ul class="social-icons">
                                    <li><i class="fab fa-facebook icon"></i></li>
                                    <li><i class="fab fa-linkedin icon"></i></li>
                                    <li><i class="fab fa-twitter-square icon"></i></li>
                                </ul>
                                <h3 class="team-title"><a href="#">williamson</a></h3>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed accumsan diam.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="figure team bg-color">
                        <div class="bg-pic">
                            <div class="pic">
                                <img src="{{ asset('assets/frontend/images/home-team/client-2.jpg') }}" alt="service">
                            </div>
                        </div>
                        <figcaption class="text-center">
                            <div class="team-content">
                                <ul class="social-icons">
                                    <li><i class="fab fa-facebook icon"></i></li>
                                    <li><i class="fab fa-linkedin icon"></i></li>
                                    <li><i class="fab fa-twitter-square icon"></i></li>
                                </ul>
                                <h3 class="team-title"><a href="#">williamson</a></h3>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed accumsan diam.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="figure team bg-color">
                        <div class="bg-pic">
                            <div class="pic">
                                <img src="{{ asset('assets/frontend/images/home-team/client-3.jpg') }}" alt="service">
                            </div>
                        </div>
                        <figcaption class="text-center">
                            <div class="team-content">
                                <ul class="social-icons">
                                    <li><i class="fab fa-facebook icon"></i></li>
                                    <li><i class="fab fa-linkedin icon"></i></li>
                                    <li><i class="fab fa-twitter-square icon"></i></li>
                                </ul>
                                <h3 class="team-title"><a href="#">williamson</a></h3>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed accumsan diam.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="swiper-btn-center">
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
                <div class="swiper-button-next swiper-button-white"></div>
            </div>
        </div>
    </div>
</section>
<!--team section-->

<!--clients section-->
<section class="row clients-section space" id="clients">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="employees text-center">
                    <i class="fas fa-truck icon"></i>
                    <p class="counter-count">6250</p>
                    <h4 class="employee-p">PROJECTS DONE</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="customer text-center">
                    <i class="fas fa-map-marker-alt icon"></i>
                    <p class="counter-count">250</p>
                    <h4 class="employee-p">PROJECTS DONE</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="design text-center">
                    <i class="fas fa-users icon"></i>
                    <p class="counter-count">5250</p>
                    <h4 class="employee-p">PROJECTS DONE</h4>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="order text-center">
                    <i class="fas fa-user icon"></i>
                    <p class="counter-count">24</p>
                    <h4 class="employee-p">PROJECTS DONE</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!--clients section-->

<!--testimonial section-->
<section class="row testimonial-section bg-color space" id="testimonial">
    <div class="container">
        <div class="title-section center pb-60">
            <h2><span>WHAT OUR CLIENT SAY</span></h2>
            <p class="title-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi.
                Duis rhoncus
                imperdiet tortor eu sodales </p>
        </div>

        <div class="swiper-container home-tsetimonial">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <figure class="testimonial">
                        <div class="pic-bg">
                            <div class="pic">
                                <img src="{{ asset('assets/frontend/images/home-testimonial/client-1.jpg') }}" alt="service">
                            </div>
                        </div>
                        <figcaption class="blog_post-catipon-inner text-center">
                            <div class="testimonial-content">
                                <h3 class="testimonial-title"><a href="#">williamson</a></h3>
                                <ul class="testimonial-rating">
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                </ul>
                                <ul class="social-icons">
                                    <li><i class="fab fa-facebook icon"></i></li>
                                    <li><i class="fab fa-linkedin icon"></i></li>
                                    <li><i class="fab fa-twitter-square icon"></i></li>
                                </ul>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit Vivamus sed accumsan diam.
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="testimonial">
                        <div class="pic-bg">
                            <div class="pic">
                                <img src="{{ asset('assets/frontend/images/home-testimonial/client-2.jpg') }}" alt="service">
                            </div>
                        </div>
                        <figcaption class="blog_post-catipon-inner text-center">
                            <div class="testimonial-content">
                                <h3 class="testimonial-title"><a href="#">williamson</a></h3>
                                <ul class="testimonial-rating">
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                </ul>
                                <ul class="social-icons">
                                    <li><i class="fab fa-facebook icon"></i></li>
                                    <li><i class="fab fa-linkedin icon"></i></li>
                                    <li><i class="fab fa-twitter-square icon"></i></li>
                                </ul>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit Vivamus sed accumsan diam.
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                <div class="swiper-slide">
                    <figure class="testimonial">
                        <div class="pic-bg">
                            <div class="pic">
                                <img src="{{ asset('assets/frontend/images/home-testimonial/client-3.jpg') }}" alt="service">
                            </div>
                        </div>
                        <figcaption class="blog_post-catipon-inner text-center">
                            <div class="testimonial-content">
                                <h3 class="testimonial-title"><a href="#">williamson</a></h3>
                                <ul class="testimonial-rating">
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                    <li class="fas fa-star icon"></li>
                                </ul>
                                <ul class="social-icons">
                                    <li><i class="fab fa-facebook icon"></i></li>
                                    <li><i class="fab fa-linkedin icon"></i></li>
                                    <li><i class="fab fa-twitter-square icon"></i></li>
                                </ul>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit Vivamus sed accumsan diam.
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="swiper-btn-center">
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
                <div class="swiper-button-next swiper-button-white"></div>
            </div>
        </div>
    </div>
</section>
<!--tstimonial section-->

<!--blog section-->
<section class="row blog_post space clearfix">
    <div class="container">
        <div class="title-section center pb-60">
            <h2><span>LATEST NEWS</span></h2>
            <p class="title-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec sagittis nisi.
                Duis rhoncus imperdiet tortor eu sodales </p>
        </div>

        <div class="swiper-container blog-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide blog-post">
                    <figure>
                        <div class="post-img">
                            <img src="{{ asset('assets/frontend/images/home-blog/post-1.jpg') }}" alt="img-blog">
                            <a class="btn main-btn" href="#"> Read More</a>
                        </div>
                        <figcaption class="blog_post-catipon-inner text-left bg-color">
                            <h4><a href="#">Lorem ipsum dolor</a></h4>
                            <p class="post_date"><span>Transport /</span><span>14 Dec </span></p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab</p>
                        </figcaption>
                    </figure>
                </div>

                <div class="swiper-slide blog-post">
                    <figure>
                        <img src="{{ asset('assets/frontend/images/home-blog/post-2.jpg') }}" alt="img-blog">
                        <a class="btn main-btn" href="#"> Read More</a>
                        <figcaption class="blog_post-catipon-inner text-left bg-color">
                            <h4><a href="#">Lorem ipsum dolor</a></h4>
                            <p class="post_date"><span>Transport /</span><span>14 Dec </span></p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab</p>
                        </figcaption>
                    </figure>
                </div>

                <div class="swiper-slide blog-post">
                    <figure>
                        <img src="{{ asset('assets/frontend/images/home-blog/post-3.jpg') }}" alt="img-blog">
                        <a class="btn main-btn" href="#"> Read More</a>
                        <figcaption class="blog_post-catipon-inner text-left bg-color">
                            <h4><a href="#">Lorem ipsum dolor</a></h4>
                            <p class="post_date"><span>Transport /</span><span>14 Dec </span></p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab</p>
                        </figcaption>
                    </figure>
                </div>

                <div class="swiper-slide blog-post">
                    <figure>
                        <img src="{{ asset('assets/frontend/images/home-blog/post-2.jpg') }}" alt="img-blog">
                        <a class="btn main-btn" href="#"> Read More</a>
                        <figcaption class="blog_post-catipon-inner text-left ">
                            <h4><a href="#">Lorem ipsum dolor</a></h4>
                            <p class="post_date"><span>Transport /</span><span>14 Dec </span></p>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab</p>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <div class="swiper-btn-center">
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
                <div class="swiper-button-next swiper-button-white"></div>
            </div>
        </div>
    </div>
</section>
<!--blog section-->

<!--subscribe section-->
<section class="subscribe-section bg-1 space">
    <div class="container">
        <div class="row">
            <div class="col-md-12 subscribe-title">
                <h4> SUBSCRIBE FOR LATEST NEWS </h4>
            </div>
            <div class="col-md-4 mini_subscribe-btn pt-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-md-4 mini_subscribe-btn pt-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="col-md-4 mini_subscribe-btn pt-4">
                <a href="#" class="submit-btn">Submit</a>
            </div>
        </div>
    </div>
</section>
<!--subscribe section-->

<!--footer-->
<footer>
    <div class="container">
        <!--footer-widgets-->
        <div class="footer-widgets container animate fadeInDownLarge" data-anim-type="fadeInDownLarge"
             data-anim-delay="400">
            <div class="row">
                <div class="widgets-col">
                    <a class="navbar-brand pb-2" href="javascript:0"> <img src="{{ asset('assets/frontend/images/all-img/logo.png') }}" alt="logo_img"
                                                                         class="img-fluid"> </a>
                    <p>   </p>

                    <p>
                        <i class="fas fa-map"></i> <span>2019 Avenue New York, NY 2019 US</span>
                    </p>
                    <p>
                        <i class="fas fa-phone-square"></i> <span>Free Call: 111 428 5581</span>
                    </p>
                    <p>
                        <i class="far fa-envelope"></i> <span> Drop us a message: info@ciazz.com </span>
                    </p>
                </div>

                <div class="widgets-col">
                    <h3> Links </h3>
                    <ul class="widget_links">
                        <li>
                            <a href="#"> Home </a>
                        </li>
                        <li>
                            <a href="#"> About Us </a>
                        </li>
                        <li>
                            <a href="#"> Blogs </a>
                        </li>
                        <li>
                            <a href="#"> Services </a>
                        </li>
                        <li>
                            <a href="#">News </a>
                        </li>
                        <li>
                            <a href="#">Contact </a>
                        </li>
                    </ul>
                </div>

                <div class="widgets-col">
                    <h3> Services </h3>
                    <ul class="widget_links">
                        <li>
                            <a href="#"> Home </a>
                        </li>
                        <li>
                            <a href="#"> About Us </a>
                        </li>
                        <li>
                            <a href="#"> Blogs </a>
                        </li>
                        <li>
                            <a href="#"> Services </a>
                        </li>
                        <li>
                            <a href="#">News </a>
                        </li>
                        <li>
                            <a href="#">Contact </a>
                        </li>
                    </ul>
                </div>
                <div class="widgets-col">
                    <h3> Company </h3>
                    <ul class="widget_links">
                        <li>
                            <a href="#"> Home </a>
                        </li>
                        <li>
                            <a href="#"> About Us </a>
                        </li>
                        <li>
                            <a href="#"> Blogs </a>
                        </li>
                        <li>
                            <a href="#"> Services </a>
                        </li>
                        <li>
                            <a href="#">News </a>
                        </li>
                        <li>
                            <a href="#">Contact </a>
                        </li>
                    </ul>
                </div>
                <div class="widgets-col">
                    <h3> Download </h3>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor illo inventore
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor illo
                        inventore </p>
                    <h4>GET TRACKINF APP ON</h4>
                    <ul class="widget_app">
                        <li>
                            <a href="#"> <img src="{{ asset('assets/frontend/images/all-img/footer-img1.png') }}" alt="app-img"> </a>
                        </li>
                        <li>
                            <a href="#"> <img src="{{ asset('assets/frontend/images/all-img/footer-img2.png') }}" alt="app-img"> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--//footer-widgets-->
<div class="row coppy-right">
    <div class="container">
        <div class="col-md-4">
            <p> RoadLiners Transport | PSD Template:</p>
        </div>
        <div class="col-md-4">
            <ul class="social-icons">
                <li><a href="#"><i class="fab fa-facebook-f icon"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin-in icon"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter icon"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest icon"></i></a></li>
                <li><a href="#"><i class="fab fa-google-plus icon"></i></a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="footer-menu">
                <li><a href="#">terms & conditions |</a></li>
                <li><a href="#">Privacy Policy |</a></li>
                <li><a href="#">Site Map </a></li>
            </ul>
        </div>
        <!--./coppy-right-->
    </div>
</div>
<!--./footer-->


<!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="fas fa-arrow-alt-circle-up h4"></i></a>
<!-- Return to Top -->
<!--page-loader-->
<div id="page-anim-preloader">
    <div class="page_preloader-inner  content-center">
        <div class="loading-window">
            <div class="car">
                <div class="strike"></div>
                <div class="strike strike2"></div>
                <div class="strike strike3"></div>
                <div class="strike strike4"></div>
                <div class="strike strike5"></div>
                <div class="car-detail spoiler"></div>
                <div class="car-detail back"></div>
                <div class="car-detail center"></div>
                <div class="car-detail center1"></div>
                <div class="car-detail front"></div>
                <div class="car-detail wheel"></div>
                <div class="car-detail wheel wheel2"></div>
            </div>
            <div class="text">
                <span>Loading</span><span class = "dots">...</span>
            </div>
        </div>
    </div>
</div>
<!--JS bootstrap-->
<script src="{{ asset('assets/frontend/js/jquery-v3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap-v4.1.3.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/animations.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/counter.js') }}"></script>
<script src="{{ asset('assets/frontend/js/crbnMenu.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom-script.js') }}"></script>
<!-- ============================================================== -->
<script src="{{ asset('assets/helpers/helper.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@include('sweetalert::alert')
</body>

</html>
