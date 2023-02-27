@extends('master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $data = $contentService->getPageSections(4); ?>
<?php $benefits = $contentService->getBenefits(); ?>

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/inner.css') }}">
    <style>
        #preparing {
            background-image: url("{{asset('public/img/why-us/preparing-bg.jpg')}}");
        }
        #streamline {
            background-image: url("{{asset('public/img/why-us/streamline-bg.jpg')}}");
        }
        .inner-content ul {
            list-style: none;
            color: #1d359f;
        }
        .inner-content ul img {
            margin-right: 20px;
        }
        .section-content {
            display: none;
        }
        .section-wrap.active .section-content {
            display: block;
        }
        .section-wrap .close {
            display: block;
            background-image: url('{{asset('public/img/why-us/arrow.png')}}');
            background-position: center;
            width: 37px;
            height: 25px;
            background-size: 100% auto;
            position: absolute;
            right: 0;
            top: 45%;
            background-repeat: no-repeat;
            opacity: 1;
        }

        .section-wrap .close.white {
            background-image: url('{{asset('public/img/why-us/arrow-white.png')}}');
        }

        .section-wrap.active .close {
            background-image: url('{{asset('public/img/why-us/close.png')}}');
            background-size: 16px auto;
            right: 0;
            top: 100%;
        }

        .section-wrap.active .close.white {
            background-image: url('{{asset('public/img/why-us/close-white.png')}}');
        }

        .section-wrap.active .close {
            display: block;
        }
    </style>
@endsection


@section('content')
    <section class="inner-page  mb-5">
        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h2 class="lblue-text text-lg-left">
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
                <a href="#" class="close"></a>
            </div>
        </section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mb-2 pr-0 pl-0">
                    <span class="blue-line half"></span>
                </div>
            </div>
        </div>

        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h2 class="lblue-text text-lg-left">
                            {!! $data['how-heading'] !!}
                        </h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-11">
                        {!! $data['how-content'] !!}
                    </div>
                </div>
            </div>
        </section>

        <?php $odd = true; ?>
        @foreach($benefits as $item)
            @if($odd)
                <section class="mt-5 mb-5 full-bg high section-wrap " id="preparing">
                    <div class="container-fluid mt-3 mb-3 position-relative">
                        <div class="row">
                            <div class="container position-relative">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 class="lblue-text text-lg-left">
                                            {!! $item->title !!}
                                        </h2>
                                    </div>
                                </div>
                                <div class="row mt-5 section-content">
                                    <div class="col-lg-1">
                                    </div>
                                    <div class="col-lg-6 offset-1">
                                        {!! $item->content !!}
                                    </div>
                                </div>
                                <a href="#" class="close white"></a>
                            </div>
                        </div>
                    </div>
                </section>
                <?php $odd=false; ?>
            @else
                <section class="mt-5 mb-5 section-wrap">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="lblue-text text-lg-left">
                                    {!! $item->title !!}
                                </h2>
                            </div>
                        </div>
                        <div class="row mb-5 section-content">
                            <div class="col-lg-11 offset-1 mt-5 inner-content">
                                {!! $item->content !!}
                            </div>
                        </div>
                        <a href="#" class="close"></a>
                    </div>
                </section>
                <?php $odd=true; ?>
            @endif
        @endforeach

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-5 mb-2 pr-0 pl-0">
                    <span class="blue-line half"></span>
                </div>
            </div>
        </div>

        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h2 class="lblue-text text-lg-left mb-4">
                            {!! $data['what-heading'] !!}
                        </h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-11">
                        <div class="row" id="why-icons">
                            {!! $data['what-content'] !!}
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="col-lg-12 mb-4">--}}
                        {{--<h2 class="lblue-text text-lg-left mb-4">--}}
                            {{--CLIENTS WHO HAVE ACHIEVED<br/>--}}
                            {{--THEIR FINANCE GOALS WITH ACOTA--}}
                        {{--</h2>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            {{--<div class="container-fluid p-no-mb">--}}
                {{--<div class="container">--}}
                    {{--<div class="row mb-2 mt-2 gray-text">--}}
                        {{--<div class="col-lg-1">--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-11">--}}
                            {{--<p class="font-weight-bold">--}}
                                {{--Think Spirits:--}}
                            {{--</p>--}}
                            {{--<ul>--}}
                                {{--<li>Sell Side Deal Advisory</li>--}}
                                {{--<li>CFO Services during transition -manage integration into Group</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-12 mt-2 mb-2 pr-0 pl-0">--}}
                            {{--<span class="blue-line quart"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="container">--}}
                    {{--<div class="row mb-2 mt-2 gray-text">--}}
                        {{--<div class="col-lg-1">--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-11">--}}
                            {{--<p class="font-weight-bold">--}}
                                {{--Think Brands--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--(Establish business processes for scale)--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-12 mt-2 mb-2 pr-0 pl-0">--}}
                            {{--<span class="blue-line quart"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="container">--}}
                    {{--<div class="row mb-2 mt-2 gray-text">--}}
                        {{--<div class="col-lg-1">--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-11">--}}
                            {{--<p class="font-weight-bold">--}}
                                {{--Myhealth--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--(Market entry strategy, Target identification, Commercial Negotiation)--}}

                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-12 mt-2 mb-2 pr-0 pl-0">--}}
                            {{--<span class="blue-line quart"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="container">--}}
                    {{--<div class="row mb-2 mt-2 gray-text">--}}
                        {{--<div class="col-lg-1">--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-11">--}}
                            {{--<p class="font-weight-bold">--}}
                                {{--Melodica--}}
                            {{--</p>--}}
                            {{--<p>--}}
                                {{--(CFO and Strategy Services – establish growth platform and exit strategy)--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-lg-12 mt-2 mb-2 pr-0 pl-0">--}}
                            {{--<span class="blue-line quart"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="container">--}}
                    {{--<div class="row mb-2 mt-2 gray-text">--}}
                        {{--<div class="col-lg-1">--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-11">--}}
                            {{--<p class="font-weight-bold">--}}
                                {{--GMW--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </section>
    </section>

@endsection


@section('js')
    <script>
        $('.section-wrap .close').on('click',function (e) {
            e.preventDefault();

            if($(this).closest('.section-wrap').hasClass('active')){
                $(this).closest('.section-wrap').removeClass('active');
            }
            else {
                $('.section-wrap').removeClass('active');
                $(this).closest('.section-wrap').addClass('active');
            }
        });
    </script>
@endsection




