@extends('master')

@inject('contentService', 'App\Services\ContentProvider')
<?php $data = $contentService->getPageSections(7); ?>

@section('css')
    <link rel="stylesheet" href="{{ asset('public/css/inner.css') }}">
@endsection

@section('content')
    <section class="inner-page  mb-5">
        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-5 ml-2">
                        <h2 class="lblue-text text-lg-left text-sm-center">
                            {{ $data['intro-heading'] }}
                        </h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-11">
                        {!! $data['intro-content'] !!}
                        
                        <a href="{{ url('terms-and-conditions/download') }}" target="_blank" class="readmore float-left">Download PDF copy</a>
                    </div>
                </div>
            </div>
        </section>


    </section>

@endsection


@section('js')
@endsection




