@extends('master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $data = $contentService->getPageSections(1); ?>
<?php $homeIcons = $contentService->getHomeIcons(); ?>
<?php $services = $contentService->getServices(); ?>

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/swiper-bundle.min.css') }}">
    <style>
        .swiper-container {
            width: 100%;
        }

        #why-icons ul {
            display: block;
            width: 100%;
            padding: 0;
            list-style: none;
            margin-left: -12%;
        }

        #why-icons ul li {
            float: right;
            width: 30%;
            text-align: center;
            background-color: #c0c5dc;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            padding: 30px;
            color: #fff;
            margin-right: -8%;
            position: relative;
            box-shadow: 10px 10px 10px rgba(0,0,0,0.3);
            background-image: url('{{ asset('public/img/home/icon-arrow.png') }}');
            background-position: 85% 70%;
            background-repeat: no-repeat;
        }

        #why-icons ul li.active {
            background-color: #1d359f;
            z-index: 1;
            background-image: none;
        }

        #why-icons ul li.active .tabcontent{
            display: block;
        }

        #why-icons ul li:first-of-type {
            margin-left: 0;
        }

        #why-icons ul li .tabcontent {
            text-align: left;
            font-size: 15px;
            line-height: 18px;
            display: none;
        }


        @media only screen and (max-width: 767px) {
            #why-icons ul  {
                margin-left: 0;
            }
            #why-icons ul li {
                float: left;
                width: 48%;
                margin-right: 2% !important;
                margin-left: 0 !important;
                position: relative;
                box-shadow: 10px 10px 10px rgba(0,0,0,0.3);
                min-height: 200px;
                margin-bottom: 20px;
            }

            #why-icons ul li .tabcontent {
                display: block !important;
            }
        }

        @media only screen and (max-width: 520px) {
            #why-icons ul li {
                float: left;
                width: 100%;
                margin-right: 0 !important;
                margin-left: 0 !important;
                margin-bottom: 20px;
                min-height: 100px;
            }
        }
    </style>
@endsection


@section('content')
    <section id="home-top" class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="{{ asset('public/'.$data['intro-image']) }}" width="100%">
                    </div>
                    <div class="col-lg-9">
                        <h2 class="mb-4 blue-text">{!! $data['intro-heading'] !!}</h2>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11 blue-text">
                                {!! $data['intro-content'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-5 mb-2 pr-0 pl-0">
                    <span class="blue-line half"></span>
                </div>
            </div>
        </div>
    </section>
    <section id="home-services" class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div id="bar-services">
                            <?php $active = false; ?>
                            @foreach($services as $service)
                                <div class="bar {{ !$active ? 'active' : '' }}">{{ $service->name }}</div>
                                @if(!$active)
                                    <?php $active = true; ?>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 content">
                    <h4 class="mt-5 blue-text">Our Services</h4>
                    <?php $active = false; ?>
                    @foreach($services as $service)
                        <div class="bar-content {{ !$active ? 'active' : '' }}">
                            <h2 class="mb-4">{{ $service->name }}</h2>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-11 blue-text">
                                    {!!  $service->content  !!}
                                    <a href="{{ url('our-services') }}" class="readmore float-right">Discover More</a>
                                </div>
                            </div>
                        </div>
                        @if(!$active)
                            <?php $active = true; ?>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        <div class="col-lg-12 mt-5 mb-2">
            <div class="row">
                <span class="blue-line full"></span>
            </div>
        </div>
    </section>

    <section id="why" class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-3">
                        <h1 class="lblue-text text-lg-right text-sm-center">{!! $data['why-heading'] !!}</h1>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11 blue-text">
                                {!! $data['why-content'] !!}
                                <div class="row" id="why-icons">
                                    <div class="col-md-12 mb-2">
                                        <ul>
                                            <?php $x = 1; ?>
                                            @foreach($homeIcons as $icon)
                                                <li>
                                                    <img class="mb-2 {{ $x >= count($homeIcons) ? 'active' : '' }}" data-icon="{{ asset('public/'.$icon->photo) }}" data-icon-active="{{ asset('public/'.$icon->photo_active) }}" src="{{ asset('public/'.$icon->photo) }}" width="100%">
                                                    <div class="tabcontent">
                                                        {!!  $icon->content !!}
                                                    </div>
                                                </li>
                                                <?php $x++; ?>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--<section id="trusted" class="mt-5 mb-5">--}}
        {{--<div class="container-fluid">--}}
            {{--<div class="container position-relative">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-12 mb-5 ml-2">--}}
                        {{--<h2 class="lblue-text text-lg-left text-sm-center">We are trusted by clients--}}
                            {{--across the world--}}
                        {{--</h2>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row mb-5">--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<img src="{{ asset('public/img/home/testi-woman.png') }}" width="110%" class="mr-n-10 fl">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<!-- Slider main container -->--}}
                        {{--<div class="testi-bubble top">--}}
                            {{--<img src="{{ asset('public/img/home/quote-top.png') }}" class="quote-top">--}}
                            {{--<div class="swiper-container">--}}
                                {{--<!-- Additional required wrapper -->--}}
                                {{--<div class="swiper-wrapper">--}}
                                    {{--<!-- Slides -->--}}
                                    {{--<div class="swiper-slide">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </div>--}}
                                    {{--<div class="swiper-slide">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </div>--}}
                                    {{--<div class="swiper-slide">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis sed do eiusmod tempor incididunt ut labore et dolore magna aliqua </div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<img src="{{ asset('public/img/home/quote-bottom.png') }}" class="quote-bottom float-right">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<!-- Slider main container -->--}}
                        {{--<div class="testi-bubble bottom">--}}
                            {{--<img src="{{ asset('public/img/home/quote-top.png') }}" class="quote-top">--}}
                            {{--<div class="swiper-container">--}}
                                {{--<!-- Additional required wrapper -->--}}
                                {{--<div class="swiper-wrapper">--}}
                                    {{--<!-- Slides -->--}}
                                    {{--<div class="swiper-slide">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>--}}
                                    {{--<div class="swiper-slide">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>--}}
                                    {{--<div class="swiper-slide">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<img src="{{ asset('public/img/home/quote-bottom.png') }}" class="quote-bottom float-right">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<img src="{{ asset('public/img/home/testi-man.png') }}" width="110%" class="ml-n-10 fl">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- If we need navigation buttons -->--}}
                {{--<div class="swiper-button-prev"></div>--}}
                {{--<div class="swiper-button-next"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection


@section('js')
    <script src="{{ asset('public/js/vendor/swiper-bundle.min.js') }}"></script>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            autoHeight: true,
            loop: false,

            // If we need pagination
            // pagination: {
            //     el: '.swiper-pagination',
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            // scrollbar: {
            //     el: '.swiper-scrollbar',
            // },
        });

        $('#why-icons li').on('click',function () {
            if($(window).width()>767) {
                $('#why-icons li').removeClass('active');
                $('#why-icons li').each(function () {
                    $(this).find('img').first().attr('src',$(this).find('img').first().attr('data-icon'));
                });

                $(this).toggleClass('active');
                if($(this).hasClass('active')){
                    $(this).find('img').first().attr('src',$(this).find('img').first().attr('data-icon-active'));
                }
            }
        });

        function updateTabContent() {
            if($(window).width()<=767) {
                $('#why-icons li').each(function () {
                    $(this).addClass('active');
                    $(this).find('img').first().attr('src',$(this).find('img').first().attr('data-icon-active'));
                });
            }
            else if($(window).width()>767) {
                $('#why-icons li').each(function () {
                    $(this).removeClass('active');
                    $(this).find('img').first().attr('src',$(this).find('img').first().attr('data-icon'));
                });

                $('#why-icons li').last().addClass('active');
                $('#why-icons li').last().find('img').attr('src',$('#why-icons li').last().find('img').first().attr('data-icon-active'));
            }
        }
        updateTabContent();

        $(window).on('resize',function () {
            setTimeout(function () {
                updateTabContent();
            },200);
        });
    </script>
@endsection




