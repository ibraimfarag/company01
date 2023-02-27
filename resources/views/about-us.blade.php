@extends('master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $data = $contentService->getPageSections(2); ?>
<?php $leaderships = $contentService->getLeadership(); ?>

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/inner.css') }}">
    <style>
        .swiper-container {
            width: 100%;
        }
        #tabs {
            width: 100%;
            margin: 0;
            padding: 0;
            list-style: none;
            position: absolute;
            z-index: 1;
        }

        #tabs li {
            width: 20%;
            float: left;
            text-align: center;
            background-color: #1d359f;
            color: #fff;
            padding: 40px 0;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            box-shadow: 10px 10px 10px rgba(0,0,0,0.3);
            font-size: 24px;
        }

        .tabcontent {
            display: none;
            padding: 20px 30px 0;
        }

        #tabs li.active .tabcontent {
            display: block;
        }


        #tabs li.active, #tabs li:hover {
            background-color: #131f55;
        }
        #tabs li.active {
            z-index: 1;
            position: relative;
            background-image: url('{{asset('public/img/about/close-icon.png')}}');
            background-position: 90% 92%;
            background-size: 15px auto;
        }

        #tabs li {
            display: block;
            background-image: url('{{asset('public/img/about/arrow-down.png')}}');
            background-repeat: no-repeat;
            background-position: 90% 70%;
            background-size: 20px auto;
            width: 20%;
            float: right;
        }

        #tabs li p {
            font-size: 16px;
        }

        #core {
            height: 100px;
        }

        @media only screen and (max-width: 1366px) {
            #tabs li {
                padding: 20px 0;
                background-position: 90% 55%;
                background-size: 15px auto;
                font-size: 18px;
            }
            #tabs li.active {
                background-size: 10px auto;
                background-position: 95% 90%;
            }
        }

        @media only screen and (max-width: 991px) {

            #core {
                height: auto;
            }

            #tabs {
                position: relative;
            }

            #tabs li {
                width: 96%;
                border-radius: 20px;
                padding: 20px 0;
                margin: 0 2% 20px !important;
                font-size: 20px;
                background-position: 95% 50%;
                background-size: 15px auto;
                float: left;
            }

            #core-values {
                margin-bottom: 30px;
                background-size: auto 100%;
            }
        }

    </style>
@endsection

@section('content')
    <section class="inner-page  mb-5">
        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <h2 class="lblue-text text-lg-left text-sm-center">
                            {!! $data['intro-heading'] !!}
                        </h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-11">
                        {!! $data['intro-content'] !!}
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h2 class="lblue-text text-lg-left text-sm-center">
                            {!! $data['mv-heading'] !!}
                        </h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-5">
                        {!! $data['mission'] !!}
                    </div>
                    <div class="col-lg-6">
                        {!! $data['vision'] !!}
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 full-bg" id="core-values">
            <div class="container-fluid position-relative">
                <div class="row">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3">
                                <img src="{{asset('public/'.$data['core-values-image'])}}" width="100%">
                            </div>
                            <div class="col-lg-8">
                                {!! $data['core-values-intro'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-5" id="core">
            <div class="container-fluid position-relative">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <ul id="tabs">
                                <li>{!! $data['core-value-1-title'] !!}
                                    <div class="tabcontent">
                                        {!! $data['core-value-1-content'] !!}
                                    </div>
                                </li>
                                <li>{!! $data['core-value-2-title'] !!}
                                    <div class="tabcontent">
                                        {!! $data['core-value-2-content'] !!}
                                    </div>
                                </li>
                                <li>{!! $data['core-value-3-title'] !!}
                                    <div class="tabcontent">
                                        {!! $data['core-value-3-content'] !!}
                                    </div>
                                </li>
                                <li>{!! $data['core-value-4-title'] !!}
                                    <div class="tabcontent">
                                        {!! $data['core-value-4-content'] !!}
                                    </div>
                                </li>
                                <li>
                                    {!! $data['core-value-5-title'] !!}
                                    <div class="tabcontent">
                                        {!! $data['core-value-5-content'] !!}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h2 class="lblue-text text-lg-left text-sm-center">
                            {!! $data['leadership-team-heading'] !!}
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-11">
                        {!! $data['leadership-team-content'] !!}
                    </div>
                </div>
                <div class="row mb-5 mt-3 team">
                    <div class="col-lg-12">
                        <?php $odd = true; ?>
                        @foreach($leaderships as $leadership)
                            <div class="row mt-5 mb-5">
                                <div class="col-lg-12">
                                </div>
                            </div>
                            @if($odd)
                                <div class="row mb-5 mt-5">
                                    <div class="col-lg-5">
                                        <img src="{{asset('public/'.$leadership->photo)}}" width="100%">
                                    </div>
                                    <div class="col-lg-4 position-relative">
                                        <div class="vcenter">
                                            <a href="#" class="arrow"></a>
                                            <h3>{{ $leadership->name }}</h3>
                                            <h5>{{ $leadership->title }}</h5>
                                            {!! $leadership->bio !!}
                                            <br/>
                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                                <?php $odd=false; ?>
                            @else
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-5">
                                        <img src="{{asset('public/'.$leadership->photo)}}" width="100%">
                                    </div>
                                    <div class="col-lg-4 position-relative">
                                        <div class="vcenter">
                                            <a href="#" class="arrow"></a>
                                            <h3>{{ $leadership->name }}</h3>
                                            <h5>{{ $leadership->title }}</h5>
                                            {!! $leadership->bio !!}
                                        </div>
                                    </div>
                                </div>
                                <?php $odd=true; ?>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt-3 mb-3">
                        <a href="{{ url('contact-us') }}" class="readmore">GET IN TOUCH WITH US</a>
                        <a href="{{ url('our-team') }}" class="readmore">SEE THE ENTIRE TEAM</a>
                    </div>
                </div>
            </div>
        </section>

    </section>

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
        })

        $('#tabs li').on('click',function () {

            if($(this).hasClass('active')){
                $('#tabs li').removeClass('active');
            }
            else {
                $('#tabs li').removeClass('active');
                $(this).toggleClass('active');
            }
        });

        // function updateTabContent() {
        //     if($(window).width()<=767) {
        //         $('#tabs li').each(function () {
        //             $(this).addClass('active');
        //         });
        //     }
        //     else if($(window).width()>767) {
        //         $('#tabs li').removeClass('active');
        //         $('#tabs li').first().addClass('active');
        //     }
        // }
        // updateTabContent();
        //
        // $(window).on('resize',function () {
        //     setTimeout(function () {
        //         updateTabContent();
        //     },200);
        // });
    </script>
@endsection




