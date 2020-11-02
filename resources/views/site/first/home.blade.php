@extends('site.first.layouts.app')

@section('content')
    <!--========================= FLEX SLIDER =====================-->
    <section class="flexslider-container" id="flexslider-container-1">

        <div class="flexslider slider" id="slider-1">
            <ul class="slides">

                @foreach($sliders as $index => $slider)
                    <li class="item-2 {{ $index == 0 ? 'clone' : '' }}" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url({{ $slider->slider_image }}) 50% 0%;background-size:cover;height:100%;">
                        <div class=" meta">
                            <div class="container">
                                @php
                                    $title = session('lang') . '_title';
                                @endphp
                                {!! $slider->$title !!}
                                <a href="{{ url('trips') }}" class="btn btn-default">{{ __('home.view_more') }}</a>
                            </div><!-- end container -->
                        </div><!-- end meta -->
                    </li><!-- end item-2 -->
                    @if($index == 1)
                        @break
                    @endif
                @endforeach
            </ul>
        </div><!-- end slider -->

        <div class="search-tabs" id="search-tabs-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <ul class="nav nav-tabs justify-content-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="#flights" data-toggle="tab">
                                    <span><i class="fa fa-plane"></i></span>
                                    <span class="d-md-inline-flex d-none st-text">{{ __('admin.flights') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#hotels" data-toggle="tab">
                                    <span><i class="fa fa-building"></i></span>
                                    <span class="d-md-inline-flex d-none st-text">
                                        {{ __('admin.hotels') }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tours" data-toggle="tab">
                                    <span><i class="fa fa-suitcase"></i></span>
                                    <span class="d-md-inline-flex d-none st-text">
                                        {{ __('admin.trips') }}
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div id="flights" class="tab-pane in active">
                                <form action="{{ url('flights/search') }}" method="get">
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-5 col-xl-4">
                                            <div class="row">

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" name="start" placeholder="{{ __('admin.from') }}">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control" name="destination" placeholder="{{ __('admin.to') }}">
                                                        <i class="fa fa-map-marker"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-5 col-xl-4">
                                            <div class="row">

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input class="form-control dpd1" placeholder="{{ __('admin.take_off') }}" name="take_off">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group left-icon">
                                                        <input class="form-control dpd2" placeholder="{{ __('admin.landing') }}" name="landing">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                                            <div class="form-group right-icon">
                                                <select class="form-control" name="adults">
                                                    <option selected> {{ __('admin.adults') }} </option>
                                                    @for($i = 1;$i < 6; $i++ )
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-2 search-btn">
                                            <button class="btn btn-orange" type="submit">{{ __('home.search') }}</button>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end flights -->

                            <div id="hotels" class="tab-pane">
                                <form method="get" action="{{ url('hotels/search') }}">
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-6 col-xl-5">
                                            <div class="row">
                                                <div class="col-6 col-md-12">
                                                    <div class="form-group right-icon">
                                                        <select class="form-control">
                                                            @php
                                                                $name = session('lang') . '_name';
                                                            @endphp
                                                            <option selected>{{ __('admin.choose_hotel') }}</option>
                                                            @foreach($hotels as $hotel)
                                                                <option value="{{ $hotel->id }}"> {{ $hotel->$name }} </option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->
                                            </div>
                                            <div class="row">

                                                <div class="col-3 col-md-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd1" name="check_in" placeholder="{{ __('admin.check_in') }}">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-3 col-md-6">
                                                    <div class="form-group left-icon">
                                                        <input type="text" class="form-control dpd2" name="check_out" placeholder="{{ __('admin.check_out') }}">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-6 col-xl-5">
                                            <div class="row">

                                                <div class="col-12 col-md-12 col-lg-6">
                                                    <div class="form-group right-icon">
                                                        <select class="form-control" name="rooms">
                                                            <option selected>{{ __('admin.rooms') }}</option>
                                                            @for($i = 1;$i < 11; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group right-icon">
                                                        <select class="form-control" name="adults">
                                                            <option selected>{{ __('admin.adults') }}</option>
                                                            @for($i = 1;$i < 11; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                        <i class="fa fa-angle-down"></i>
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-6 col-xl-5">
                                            <div class="row">
                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group right-icon">
                                                        <input type="text" class="form-control" placeholder="{{ __('home.price_from') }}" name="price_from">
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-6 col-md-6 col-lg-6">
                                                    <div class="form-group right-icon">
                                                        <input type="text" class="form-control" placeholder="{{ __('home.price_to') }}" name="price_from">
                                                    </div>
                                                </div><!-- end columns -->
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-2 search-btn">
                                            <button class="btn btn-orange">Search</button>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end hotels -->

                            <div id="tours" class="tab-pane">
                                <form method="get" action="{{ url('trips/search') }}">
                                    @csrf
                                    <div class="row">

                                        <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control" name="start" placeholder="{{ __('home.start_place') }}" />
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                                            <div class="form-group right-icon">
                                                <input type="text" class="form-control" name="destination" placeholder="{{ __('home.destination_place') }}" />
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-2 col-xl-3">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd1" name="start_at" placeholder="{{ __('admin.start_at') }}" />
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-6 col-xl-3">
                                            <div class="row">

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group right-icon">
                                                        <input type="text" class="form-control" placeholder="{{ __('home.price_from') }}" name="price_from">
                                                    </div>
                                                </div><!-- end columns -->

                                                <div class="col-12 col-md-6">
                                                    <div class="form-group right-icon">
                                                        <input type="text" class="form-control" placeholder="{{ __('home.price_to') }}" name="price_to">
                                                    </div>
                                                </div><!-- end columns -->

                                            </div><!-- end row -->
                                        </div><!-- end columns -->

                                        <div class="col-12 col-md-12 col-lg-12 col-xl-2 search-btn">
                                            <button class="btn btn-orange">{{ __('home.search') }}</button>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->
                                </form>
                            </div><!-- end tours -->

                        </div><!-- end tab-content -->

                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end search-tabs -->

    </section>
    <!-- end flexslider-container -->


    <!--=============== HOTEL OFFERS ===============-->
    @if(in_array('hotel_offers', $page_filter))
    <section id="hotel-offers" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h2>{{ __('admin.hotels_offers') }}</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
                        @foreach($offers as $offer)
                        <div class="item">
                            <div class="main-block hotel-block">
                                <div class="main-img">
                                    <a href="#">
                                        <img src="{{ $offer->hotel->hotel_image }}" class="img-fluid" alt="hotel-img" />
                                    </a>
                                    <div class="main-mask">
                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="list-inline-item price"> {{ $offer->price }} {{ __('home.le') }} <span
                                                    class="divider">|</span><span class="pkg"> {{ __('home.avg_night') }} </span></li>
                                            <li class="list-inline-item rating">
                                                @for($i = 0; $i < $offer->hotel->stars_number; $i++)
                                                    <span><i class="fa fa-star orange"></i></span>
                                                @endfor
                                            </li>
                                        </ul>
                                    </div><!-- end main-mask -->
                                </div><!-- end offer-img -->

                                <div class="main-info hotel-info">
                                    <div class="arrow">
                                        <a href="#"><span><i class="fa fa-angle-right"></i></span></a>
                                    </div><!-- end arrow -->

                                    <div class="main-title hotel-title">
                                        @php
                                            $name = session('lang') . '_name';
                                        @endphp
                                        <a href="#">{{ $offer->hotel->$name }}</a>
                                    </div><!-- end hotel-title -->
                                </div><!-- end hotel-info -->
                            </div><!-- end hotel-block -->
                        </div><!-- end item -->
                        @endforeach
                    </div><!-- end owl-hotel-offers -->

                    <div class="view-all text-center">
                        <a href="{{ url('hotels') }}" class="btn btn-orange">{{ __('admin.view_all') }}</a>
                    </div><!-- end view-all -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    @endif
    <!-- end hotel-offers -->


    <!--======================= BEST FEATURES =====================-->
    @if(in_array('our_service', $page_filter))
    <section id="best-features" class="banner-padding black-features">
        <div class="container">
            <div class="row">
                @php
                    $title = session('lang') . '_title';
                    $desc = session('lang') . '_description';
                @endphp
                @foreach($services as $index => $service)
                <div class="col-md-6 col-lg-3">
                    <div class="b-feature-block">
                        <span><i class="fa fa-dollar"></i></span>
                        <h3>{{ $service->$title }}</h3>
                        <p>{{ $service->$desc }}</p>
                    </div><!-- end b-feature-block -->
                </div><!-- end columns -->
                    @if ($index == 3)
                        @break
                    @endif
                @endforeach

            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end best-features -->
    @endif


    <!--=============== Trip OFFERS ===============-->
    <section id="tour-offers" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h2>{{ __('admin.trips') }}</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-tour-offers">
                        @foreach($trips as $index => $trip)
                        <div class="item">
                            <div class="main-block tour-block">
                                <div class="main-img">
                                    <a href="#">
                                        <img src="{{ $trip->trip_image }}" class="img-fluid" alt="tour-img" style="width: 100% !important;"/>
                                    </a>
                                </div><!-- end offer-img -->

                                <div class="offer-price-2">
                                    <ul class="list-unstyled">
                                        <li class="price">{{ __('home.le') }} {{ $trip->price }}
                                            <a href="#"><span class="arrow"><i class="fa fa-angle-right"></i></span></a>
                                        </li>
                                    </ul>
                                </div><!-- end offer-price-2 -->

                                <div class="main-info tour-info">
                                    <div class="main-title tour-title">
                                        @php
                                            $title = session('lang') . '_title';
                                            $start = session('lang') . '_start';
                                        @endphp
                                        <a href="#">{{ $trip->$title }}</a>
                                        <p>{{ __('admin.from') }}: {{ $trip->$start }}</p>
                                    </div><!-- end tour-title -->
                                </div><!-- end tour-info -->
                            </div><!-- end tour-block -->
                        </div><!-- end item -->
                        @endforeach
                    </div><!-- end owl-tour-offers -->

                    <div class="view-all text-center">
                        <a href="{{ url('trips') }}" class="btn btn-orange">{{ __('admin.view_all') }}</a>
                    </div><!-- end view-all -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end tour-offers -->



    @if(in_array('about', $page_filter))
    <!--==================== VIDEO BANNER ===================-->
    <section id="video-banner" class="banner-padding back-size">
        <div class="container">
            <div class="row">
                @php
                    $title = session('lang') . '_title';
                    $desc = session('lang') . '_description';
                @endphp
                <div class="col-sm">
                    <h2>{{ $aboutUs->$title }}</h2>
                    <p>
                        {{ $aboutUs->$desc }}
                    </p>
                    <div class="margin-small py-5 mt-5 m-sm-0 "></div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn video-btn" id="play-button" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/0O2aH4XLbto" data-target="#myModal"><span><i
                                class="fa fa-play mt-0 m-sm-0"></i></span>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">

                                <div class="modal-body">

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <!-- 16:9 aspect ratio -->

                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="#" id="video"
                                                allowscriptaccess="always">></iframe>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end video-banner -->
    @endif


    <!--================= FLIGHT OFFERS =============-->
    <section id="flight-offers" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h2>{{ __('admin.flights') }}</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="row">
                        @foreach($flights as $index => $flight)
                            <div class="col-md-6 col-lg-4">
                            <div class="main-block flight-block">
                                <a href="#">
                                    <div class="flight-img">
                                        <img src="{{ $flight->flight_image }}" class="img-fluid" alt="flight-img" />
                                    </div><!-- end flight-img -->

                                    <div class="flight-info">
                                        <div class="flight-title">
                                            @php
                                                $dest = session('lang') . '_destination';
                                            @endphp
                                            <h3><span class="flight-destination">{{ $flight->$dest }}</span>|
                                                <span class="flight-type">{{ $flight->status == 0 ? __('admin.one_way') : __('admin.two_way') }}</span></h3>
                                        </div><!-- end flight-title -->

                                        <div class=" flight-timing">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <span><i class="fa fa-plane"></i></span>
                                                    <span class="date">
                                                        {{ date('M,d-Y', strtotime($flight->take_off)) }}
                                                        </span>
                                                    ({{ date('g:i A', strtotime($flight->landing_time)) }})
                                                </li>
                                                <li>
                                                    <span><i class="fa fa-plane"></i></span>
                                                    <span class="date">
                                                        {{ date('M,d-Y', strtotime($flight->landing)) }}
                                                    </span>
                                                    ( {{ date('g:i A', strtotime($flight->landing_time)) }} )
                                                </li>
                                            </ul>
                                        </div><!-- end flight-timing -->

                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="list-inline-item price"> {{ __('home.le') }} {{ $flight->price }}
                                                <span class="pkg">{{ __('home.avg_person') }}</span>
                                            </li>
                                        </ul>
                                    </div><!-- end flight-info -->
                                </a>
                            </div><!-- end flight-block -->
                        </div><!-- end columns -->
                        @endforeach
                    </div><!-- end row -->

                    <div class="view-all text-center">
                        <a href="{{ url('flights') }}" class="btn btn-orange">{{ __('admin.view_all') }}</a>
                    </div><!-- end view-all -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end flight-offers -->


    <!--==================== HIGHLIGHTS ====================-->
    @if(in_array('stat', $page_filter))
    <section id="highlights" class="section-padding back-size">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row">

                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 d-flex justify-content-center">
                            <div class="highlight-box">
                                <div class="h-icon">
                                    <span><i class="fa fa-plane"></i></span>
                                </div><!-- end h-icon -->

                                <div class="h-text">
                                    <span class="numbers">{{ $flights_count }}</span>
                                    <p>{{ __('home.flight') }}</p>
                                </div><!-- end h-text -->
                            </div><!-- end highlight-box -->
                        </div><!-- end columns -->

                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 d-flex justify-content-center">
                            <div class="highlight-box">
                                <div class="h-icon">
                                    <span><i class="fa fa-building-o"></i></span>
                                </div><!-- end h-icon -->

                                <div class="h-text cruise">
                                    <span class="numbers">{{ $hotels_count }}</span>
                                    <p> {{ __('home.hotel') }} </p>
                                </div><!-- end h-text -->
                            </div><!-- end highlight-box -->
                        </div><!-- end columns -->

                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 d-flex justify-content-center">
                            <div class="highlight-box">
                                <div class="h-icon">
                                    <span><i class="fa fa-taxi"></i></span>
                                </div><!-- end h-icon -->

                                <div class="h-text taxi">
                                    <span class="numbers">{{ $trips_count }}</span>
                                    <p>{{ __('admin.trip') }}</p>
                                </div><!-- end h-text -->
                            </div><!-- end highlight-box -->
                        </div><!-- end columns -->

                    </div><!-- end row -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    @endif
    <!-- end highlights -->



    @if(in_array('testimonials', $page_filter))
    <!--==================== TESTIMONIALS ====================-->
    <section id="testimonials" class="section-padding back-size">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading white-heading">
                        <h2>{{ __('admin.testimonials') }}</h2>
                        <hr class="heading-line" />
                    </div><!-- end page-heading -->

                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <div class="carousel-inner text-center">
                            @foreach($testimonials as $index => $testimonial)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                @php
                                    $desc = session('lang') . '_description';
                                    $name = session('lang') . '_name';
                                @endphp
                                <blockquote>
                                    {{ $testimonial->$desc }}
                                </blockquote>
                                <div class="rating">
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star orange"></i></span>
                                    <span><i class="fa fa-star lightgrey"></i></span>
                                </div><!-- end rating -->

                                <small>{{ $testimonial->$name }}</small>
                            </div><!-- end item -->
                                @if($index == 2)
                                    @break
                                @endif
                            @endforeach
                        </div><!-- end carousel-inner -->

                        <ol class="carousel-indicators mx-auto">
                            @foreach($testimonials as $index => $testimonial)
                            <li data-target="#quote-carousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ $testimonial->testimonial_image }}" class="img-fluid d-block" alt="client-img">
                            </li>
                                @if($index == 2)
                                    @break
                                @endif
                            @endforeach
                        </ol>

                    </div><!-- end quote-carousel -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end testimonials -->
    @endif

    <!--================ LATEST BLOG ==============-->
    @if(in_array('latest_blog', $page_filter))
    <section id="latest-blog" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-heading">
                        <h2>{{ __('home.latest_blog') }}</h2>
                        <hr class="heading-line" />
                    </div>

                    <div class="row">
                        @foreach($blogs as $index => $blog)
                        <div class="col-md-6 col-lg-4">
                            @php
                                $title = session('lang') . '_title';
                                $content = session('lang') . '_content';
                                $author = session('lang') . '_author';
                            @endphp
                            <div class="main-block latest-block">
                                <div class="main-img latest-img">
                                    <a href="#">
                                        <img src="{{ $blog->blog_image }}" class="img-fluid" alt="blog-img" />
                                    </a>
                                </div><!-- end latest-img -->

                                <div class="latest-info">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span> <i class="fa fa-calendar-minus-o"></i></span>
                                            {{ $blog->created_at->format('d M Y') }}
                                            <span class="author">{{ __('home.by') }} : <a href="#">{{ $blog->$author }}</a></span></li>
                                    </ul>
                                </div><!-- end latest-info -->

                                <div class="main-info latest-desc">
                                    <div class="row">
                                        <div class="col-10 col-md-10 main-title">
                                            <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                                {{ $blog->$title }}
                                            </a>
                                            {!! $blog->$content !!}
                                        </div><!-- end columns -->
                                    </div><!-- end row -->

                                    <span class="arrow"><a href="#"><i class="fa fa-angle-right"></i></a></span>
                                </div><!-- end latest-desc -->
                            </div><!-- end latest-block -->
                        </div><!-- end columns -->
                        @if($index == 2)
                            @break
                        @endif
                        @endforeach
                    </div><!-- end row -->

                    <div class="view-all text-center">
                        <a href="{{ url('blogs') }}" class="btn btn-orange">{{ __('admin.view_all') }}</a>
                    </div><!-- end view-all -->
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!-- end latest-blog -->
    @endif


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
