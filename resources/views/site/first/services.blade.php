@extends('site.first.layouts.app')

@section('content')
    <!--=============== PAGE-COVER ==============-->
    <section class="page-cover" id="cover-services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ __('home.our_services') }}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('home.our_services') }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="services-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-heading">
                            <h2>{{ __('home.our_services') }}</h2>
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->

                        <div class="row">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            @foreach($services as $index => $service)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="service-block-1">
                                        <div class="service-icon-1">
                                            <span><i class="fa fa-globe"></i></span>
                                        </div><!-- end service-icon-1 -->

                                        <div class="service-text-1">
                                            <h3>{{ $service->$title }}</h3>
                                            <p>{{ $service->$desc }}</p>
                                        </div><!-- end service-text-1 -->
                                    </div><!-- end service-block-1 -->
                                </div><!-- end columns -->
                            @endforeach
                        </div><!-- end row -->
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end services-section -->

        <div id="search-banner" class="innerpage-103-pd-tb back-size">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 col-xl-7">
                        <p> {{ __('home.perfect_place') }} </p>
                        <h2>{{ __('home.desired_flight') }}</h2>
                        <a href="{{ url('/') }}" class="btn btn-black btn-lg">{{ __('home.search') }}</a>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end search-banner -->

    </section><!-- end innerpage-wrapper -->

    <!--======================= BEST FEATURES =====================-->
    <section id="best-features" class="banner-padding black-features">
        <div class="container">
            <div class="row">
                @foreach($services as $index => $service)
                    <div class="col-md-6 col-lg-3">
                        <div class="b-feature-block">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <span><i class="fa fa-dollar"></i></span>
                            <h3>{{ $service->$title }}</h3>
                            <p>{{ $service->$desc }}</p>
                        </div><!-- end b-feature-block -->
                    </div><!-- end columns -->
                    @if($index == 3)
                        @break
                    @endif
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end best-features -->

    <!--========================= NEWSLETTER-1 ==========================-->
    <section id="newsletter-1" class="section-padding back-size newsletter">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <h2>{{ __('home.subscribe_our_newsletter') }}</h2>
                    <p>{{ __('home.subscribe_to_updates') }}</p>
                    <form>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control input-lg"
                                       placeholder="{{ __('home.email_contact') }}" required />
                                <span class="input-group-btn"><button class="btn btn-lg"><i
                                            class="fa fa-envelope"></i></button></span>
                            </div>
                        </div>
                    </form>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end newsletter-1 -->


@endsection
