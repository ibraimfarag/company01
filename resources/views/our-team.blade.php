@extends('master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $data = $contentService->getTeam(); ?>

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
            background-image: url('{{asset('public/img/our-team/close-icon.png')}}');
            background-position: 90% 92%;
            background-size: 15px auto;
        }

        #tabs li {
            display: block;
            background-image: url('{{asset('public/img/our-team/arrow-down.png')}}');
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

        .team h5 {
            text-transform: uppercase;
            font-weight: 400;
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

        .team h3 {
            margin-bottom: 3px;
            transition: color 300ms;
        }


        .team h5 {
            transition: color 300ms;
        }

        .team h3, .team h5 {
            color: #fff;
        }


        .team img {
            transition: border-color 300ms;
        }

        .team a {
            text-decoration: none;
            transition: color 300ms;
        }

        .team .member {
            position: relative;
            overflow: hidden;
        }

        .member .wrap {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: #1d359f;
            color: #909cd0;
            top: 0;
            display: none;
        }

        .member:hover .wrap {
            display: block;
        }

        .member:hover .wrap a {
            color: #909cd0;
        }

        .conts {
            position: absolute;
            width: 100%;
            bottom: 0;
            text-align: left;
            padding: 30px;
        }

        .team .modal-body h3 {
            color: #1d359f;
        }
        .team .modal-body  h5 {
            color: #abb9ea;
        }

        @media only screen and (max-width: 560px){
            .conts {
                position: relative;
                bottom: 0;
            }

            .member .wrap {
                position: relative;
                display: block;
                background: none;
            }

            .team h3, .team h5 {
                color: #1d359f;
            }

            .biolink {
                background-color: #1d359f;
                display: inline-block;
                color: #fff;
                padding: 8px 20px;
            }
        }

        .slide-in-bottom{-webkit-animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) both;animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) both}
        @-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}
        .slide-in-left{-webkit-animation:slide-in-left .3s cubic-bezier(.25,.46,.45,.94) both;animation:slide-in-left .3s cubic-bezier(.25,.46,.45,.94) both}
        @-webkit-keyframes slide-in-left{0%{-webkit-transform:translateX(-1000px);transform:translateX(-1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}@keyframes slide-in-left{0%{-webkit-transform:translateX(-1000px);transform:translateX(-1000px);opacity:0}100%{-webkit-transform:translateX(0);transform:translateX(0);opacity:1}}
    </style>
@endsection

@section('content')
    <section class="inner-page  mb-5">
        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h2 class="lblue-text text-lg-left text-sm-center">
                            Our Team
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-11">
                    </div>
                </div>
                <div class="row mb-5 mt-3 team">
                    <div class="col-lg-1">
                    </div>
                    {{--<div class="col-lg-11">--}}
                    {{--<?php $odd = true; ?>--}}
                    {{--@foreach($data as $team)--}}
                    {{--@if($odd)--}}
                    {{--<div class="row mb-5">--}}
                    {{--<div class="col-lg-5">--}}
                    {{--<img src="{{asset('public/'.$team->photo)}}" width="100%">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4 position-relative">--}}
                    {{--<div class="vcenter">--}}
                    {{--<h3>{{ $team->name }}</h3>--}}
                    {{--<h5>{{ $team->title }}</h5>--}}
                    {{--{!! $team->bio !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<?php $odd = false; ?>--}}
                    {{--@else--}}
                    {{--<div class="row mb-5">--}}
                    {{--<div class="col-lg-2">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-5">--}}
                    {{--<img src="{{asset('public/'.$team->photo)}}" width="100%">--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-4 position-relative">--}}
                    {{--<div class="vcenter">--}}
                    {{--<h3>{{ $team->name }}</h3>--}}
                    {{--<h5>{{ $team->title }}</h5>--}}
                    {{--{!! $team->bio !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<?php $odd = true; ?>--}}
                    {{--@endif--}}
                    {{--@endforeach--}}
                    {{--</div>--}}

                    <div class="col-lg-12">
                        <div class="row team">
                        @foreach($data as $team)

                            <!-- Modal -->
                                <div class="modal fade" id="{{ \Illuminate\Support\Str::slug($team->name.$team->title) }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <img src="{{asset('public/'.$team->photo)}}" width="300" class="mb-2">
                                                <h3>{{ $team->name }}</h3>
                                                <h5><b>{{ $team->title }}</b></h5>
                                                <p>{!! $team->bio !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-6 text-center mb-5 member">
                                    <div style="position: relative">
                                        <a href="#"  data-toggle="modal" data-target="#{{ \Illuminate\Support\Str::slug($team->name.$team->title) }}">
                                            <img src="{{asset('public/'.$team->photo)}}" width="100%">
                                        </a>
                                        <div class="wrap slide-in-left">
                                            <div class="conts">
                                                <h3>{{ $team->name }}</h3>
                                                <h5><b>{{ $team->title }}</b></h5>
                                                <a href="#" class="biolink" data-toggle="modal" data-target="#{{ \Illuminate\Support\Str::slug($team->name.$team->title) }}">VIEW BIO</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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




