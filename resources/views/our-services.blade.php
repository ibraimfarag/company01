@extends('master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $data = $contentService->getServices(); ?>

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/inner.css') }}">
    <style>
        .inner-content ul {
            list-style: none;
            color: #1d359f;
        }
        .inner-content ul img {
            margin-right: 20px;
        }
        #services {
            background-image: url("{{asset('public/img/our-services/services-bg.jpg')}}");
            background-position: top center;
            background-color: #000;
        }
        hr {
            border-color: #1d359f;
            margin: 0;
        }

        .tab-wrap section {
            display: none;
        }

        .tab-wrap .main-tab , .active.tab-wrap section {
            display: block;
        }

        .sub-head {
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <section class="inner-page">
        @foreach($data as $item)
            <div class="tab-wrap">
                <section class="mt-5 mb-5 main-tab">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                                <h2 class="lblue-text text-lg-left">
                                    {{ $item->name }}
                                </h2>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-1">
                            </div>
                            <div class="col-lg-11">
                                {!! $item->content !!}
                                <a href="#" class="readmore float-right rm">Read more</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="full-bg" id="services">
                    <div class="container-fluid position-relative">
                        <div class="row">
                            <div class="container position-relative">
                                <div class="row">
                                    <div class="col-lg-1"></div>
                                    <div class="col-lg-11">
                                        <?php $itemsCount = count($item->items); ?>
                                        <?php $index = 1; ?>
                                        @foreach($item->items as $sub)
                                        <div class="row mb-5 mt-5">
                                            <div class="col-lg-3">
                                                <img src="{{asset('public/'.$sub->image)}}" width="100%">
                                            </div>
                                            <div class="col-lg-9">
                                                <h2 class="mt-4 mb-4">
                                                    {!! $sub->title !!}</h2>
                                                {!! $sub->content !!}
                                            </div>
                                        </div>

                                        @if($index==$itemsCount)
                                            @if($item->content_bottom)
                                                <div class="row mb-5 mt-5">
                                                    <div class="col-lg-12">
                                                        {!! $item->content_bottom !!}
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <a href="#" class="readmore float-right rl">Read less</a>
                                                </div>
                                            </div>
                                        @endif

                                        <?php $index++; ?>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <hr/>
        @endforeach
    </section>

@endsection


@section('js')
    <script>
        $('.rm').on('click',function (e) {
            e.preventDefault();
            $(this).closest('.tab-wrap').toggleClass('active');
            $(this).addClass('hidden');
            $(this).closest('.tab-wrap').find('.rl').removeClass('hidden');
        });
        $('.rl').on('click',function (e) {
            e.preventDefault();
            $(this).closest('.tab-wrap').toggleClass('active');
            $(this).closest('.tab-wrap').find('.rm').removeClass('hidden');
            $(this).addClass('hidden');
        });
    </script>
@endsection




