
@extends('master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $data = $contentService->getPageSections(5); ?>
<?php $clientCategories = $contentService->getClientCats(); ?>

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/inner.css') }}">
    <style>
        .swiper-container {
            width: 100%;
        }
        .partner {
            width: 100%;
            height: 150px;
            background-color: #ccc;
        }
        .swiper-container {
            padding: 0 60px;
        }
        .swiper-slide ul {
            padding-left: 20px;
        }
    </style>
@endsection

@section('content')
    <section class="inner-page  mb-5">
        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-5 ml-2">
                        <h2 class="lblue-text text-lg-left text-sm-center">
                            {!! $data['intro-heading'] !!}
                        </h2>
                        {!! $data['intro-content'] !!}
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-12">
                        @foreach($clientCategories as $cat)
                            <h4 class="lblue-text text-lg-left text-sm-center mb-3">
                                {{ $cat->title }}
                            </h4>
                            <div class="row">
                                @foreach($cat->clients as $client)
                                    <div class="col-md-3">
                                        <a href="{{ $client->url }}" target="_blank"><img src="{{ asset('public/'.$client->photo) }}" width="100%;"></a>
                                    </div>
                                @endforeach
                            </div>
                            <hr/>
                        @endforeach
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
            autoHeight: false,
            loop: false,

            slidesPerView: 4,
            spaceBetween: 60,

            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                // when window width is >= 640px
                991: {
                    slidesPerView: 4,
                    spaceBetween: 40
                }
            },

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
    </script>
@endsection

