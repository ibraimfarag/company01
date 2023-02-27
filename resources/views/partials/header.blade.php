<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>ACOTA : Official Website</title>
    <meta name="description" content="At ACOTA, we provide a scalable service to assist with the day-to-day finance operations of our clients. We utilise professionally qualified offshore talent to provide a cost-effective service, while maintaining strict quality standards.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="ACOTA">
    <meta property="og:type" content="">
    <meta property="og:url" content="http://acota.com.au/">
    <meta property="og:image" content="">

    <link rel="manifest" href="{{ asset('public/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('public/img/favicons') }}/favicon-16x16.png" type="image/png">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/img/favicons') }}/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('public/img/favicons') }}/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/img/favicons') }}/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/favicons') }}/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/img/favicons') }}/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/img/favicons') }}/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/img/favicons') }}/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/img/favicons') }}/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/favicons') }}/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('public/img/favicons') }}/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/img/favicons') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('public/img/favicons') }}/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/img/favicons') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('public/img/favicons') }}/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('public/img/favicons') }}/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{ asset('public/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/main.css?v=05072021') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome.css') }}" >

    @yield('css')
    <meta name="theme-color" content="#fafafa">
</head>

<body>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-6 text-sm-left">
                <a href="{{url('/')}}">
                    <img src="{{ asset('public/img/acota-logo.png') }}" alt="Acota Logo" id="main-logo">
                </a>
            </div>
            <div class="col-lg-9 col-sm-6 col-6">
                <div id="menu-burger" onclick="toggleBurger(this)">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>

                <ul id="main-menu">
                    <li class="{{ !isset($currentPage) ? 'active' : '' }}"><a href="{{url('/')}}">Home <br/><span class="line"></span></a></li>
                    <li class="{{ isset($currentPage) ? ( $currentPage == 'about-us' ? 'active' : '') : '' }}"><a href="{{url('about-us')}}">About Us <br/><span class="line"></span></a></li>
                    <li class="{{ isset($currentPage) ? ( $currentPage == 'our-services' ? 'active' : '') : '' }}"><a href="{{url('our-services')}}">Our Services <br/><span class="line"></span></a></li>
                    <li class="{{ isset($currentPage) ? ( $currentPage == 'why-us' ? 'active' : '') : '' }}"><a href="{{url('why-us')}}">Why Us? <br/><span class="line"></span></a></li>
                    <li class="{{ isset($currentPage) ? ( $currentPage == 'our-clients' ? 'active' : '') : '' }}"><a href="{{url('our-clients')}}">Our Clients <br/><span class="line"></span></a></li>
                    <li class="{{ isset($currentPage) ? ( $currentPage == 'our-team' ? 'active' : '') : '' }}"><a href="{{url('our-team')}}">Our Team <br/><span class="line"></span></a></li>
<!--                    <li class="{{ isset($currentPage) ? ( $currentPage == 'faqs' ? 'active' : '') : '' }}"><a href="{{url('faqs')}}">FAQs <br/><span class="line"></span></a></li>-->
<!--                    <li class="{{ isset($currentPage) ? ( $currentPage == 'contact-us' ? 'active' : '') : '' }}"><a href="{{url('contact-us')}}">Contact Us <br/><span class="line"></span></a></li>-->
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 pr-0 pl-0">
                <span class="blue-line half"></span>
            </div>
        </div>
    </div>
</header>

