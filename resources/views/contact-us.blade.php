@extends('master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $data = $contentService->getPageSections(9); ?>

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/inner.css') }}">
    <style>
        #contact-box {
            background-image: url("{{asset('public/img/contact-us/box-bg.jpg')}}");
            background-size: auto 100%;
            background-position: center;
            padding: 300px 60px 60px;
            color: #fff;
        }

        @media only screen and (max-width: 991px) {
            #contact-box {
                background-size: 100% auto;
                padding: 10px 60px 10px;
            }
        }
    </style>
@endsection

@section('content')
    <section class="inner-page mb-5">
        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="lblue-text text-lg-left text-sm-center mb-5">
                            {{ $data['intro-heading'] }}
                        </h2>
                        @if(Session::has('success'))
                            <div class="alert-success alert">
                                {{ Session::get('success') }}
                            </div>
                        @else
                            {!! $data['intro-content'] !!}
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row mb-5">
                    <div class="col-lg-5">
                        <div id="contact-box" class="mb-5">
                            <div class="row mt-5 mb-5">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    {!! $data['contact-1'] !!}
                                </div>
                            </div>
                            <div class="row mt-5 mb-5">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    {!! $data['contact-2'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <form action="{{ url('/form-submit') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Full name:</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Phone number:</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea name="message" class="form-control" rows="10" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="readmore">
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </section>

    </section>

@endsection


@section('js')
@endsection




