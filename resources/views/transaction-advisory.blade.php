@extends('master')


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
    </style>
@endsection


@section('content')
    <section class="inner-page">
        <section class="mt-5 mb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h2 class="lblue-text text-lg-left">
                            Transaction Advisory
                        </h2>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-11">
                        <p>
                            We go beyond the day to day.  Our team and other specialists we work with, such as legal and specialist tax advisors, can assist you with valuation services, buying and selling a business, and raising debt capital.
                        </p>
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
                                <div class="row mb-5 mt-5">
                                    <div class="col-lg-12">
                                        <div class="row" id="">
                                            <div class="col-md-12 mb-5">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img class="mb-2" src="{{ asset('public/img/transaction/valuation.png') }}" width="100%">
                                                    </div>
                                                    <div class="col-md-8 position-relative">
                                                        <div class="vcenter">
                                                            <h2>Valuation Services</h2>
                                                            <p>
                                                                Whether you are looking to buy a business, or sell your own, we can assist you in determining the value of that business.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-5">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img class="mb-2" src="{{ asset('public/img/transaction/buying.png') }}" width="100%">
                                                    </div>
                                                    <div class="col-md-8 position-relative">
                                                        <div class="vcenter">
                                                            <h2>Buying a Business</h2>
                                                            <p>
                                                                We can support with target identification, deal strategy, commercial negotiations, due diligence, documentation and even post-acquisition integration.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-5">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img class=" mb-2" src="{{ asset('public/img/transaction/selling.png') }}" width="100%">
                                                    </div>
                                                    <div class="col-md-8 position-relative">
                                                        <div class="vcenter">
                                                            <h2>Selling a Business</h2>
                                                            <p>
                                                                We can help you secure the maximum value for your business by working with you and your team to position the business for sale, identifying prospective buyers, commercial negotiation and being your eyes and ears through the documentation process.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-5">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img class="mb-2" src="{{ asset('public/img/transaction/raising.png') }}" width="100%">
                                                    </div>
                                                    <div class="col-md-8 position-relative">
                                                        <div class="vcenter">
                                                            <h2>Raising Debt Capital</h2>
                                                            <p>
                                                                Successful and profitable businesses may still require cash to supplement investor funds. We can source and negotiate debt capital, whether you are in the process of refinancing existing debt, raising fresh borrowings or managing debt existing debt. We help our clients by sourcing options from traditional banks and working capital providers, or via private debt markets as appropriate.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-5 mb-5 pt-5 pb-5">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-11">
                        <p class="mb-0">
                            Depending on your circumstances, you may have specific advisors you wish to work with.  ACOTA can work with your advisors or introduce you to the specialist skills you need among the network of professionals we work with.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </section>

@endsection


@section('js')
@endsection




