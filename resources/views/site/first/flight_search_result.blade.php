@extends('site.first.layouts.app')

@section('content')

    <!--======================= PAGE-COVER =====================-->
    <section class="page-cover back-size" id="cover-flight-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title"> {{ __('home.flight_search_result') }} </h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('home.flight_search_result') }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="search-result-page" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 content-side">
                        <div class="page-search-form">
                            <h2>{{ __('home.search_about') }} <span>{{ __('home.flight') }} <i class="fa fa-plane"></i></span></h2>

                            <div class="tab-content">
                                <div id="tab-round-trip" class="tab-pane in active">
                                    <form class="pg-search-form" action="{{ url('flights/search') }}" method="get">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label><span><i class="fa fa-map-marker"></i></span>{{ __('admin.from') }}</label>
                                                    <input class="form-control" name="start" placeholder="{{ __('home.start') }}" value="{{ request('start') }}"/>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                                                <div class="form-group">
                                                    <label><span><i class="fa fa-map-marker"></i></span>{{ __('admin.to') }}</label>
                                                    <input class="form-control" name="destination" placeholder="{{ __('home.destination') }}" value="{{ request('destination') }}"/>
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        <div class="form-group">
                                                            <label><span><i class="fa fa-calendar"></i></span>{{ __('admin.take_off') }}</label>
                                                            <input class="form-control dpd1" name="take_off" placeholder="{{ __('admin.date') }}" value="{{ request('take_off') }}"/>
                                                        </div>
                                                    </div><!-- end columns -->

                                                    <div class="col-6 col-md-6">
                                                        <div class="form-group">
                                                            <label><span><i class="fa fa-calendar"></i></span>{{ __('admin.landing') }}</label>
                                                            <input class="form-control dpd2" name="landing" placeholder="Date" value="{{ request('landing') }}"/>
                                                        </div>
                                                    </div><!-- end columns -->
                                                </div>
                                            </div><!-- end columns -->

                                            <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                                                <div class="form-group">
                                                    <label><span><i class="fa fa-users"></i></span>{{ __('admin.adults') }}</label>
                                                    <input type="number" class="form-control" name="adults" placeholder="Total" min="0" value="{{ request('adults') }}" />
                                                </div>
                                            </div><!-- end columns -->
                                        </div><!-- end row -->

                                        <button class="btn btn-orange" type="submit">{{ __('home.search') }}</button>
                                    </form>
                                </div><!-- end tab-round-trip -->

                            </div><!-- end tab-content -->
                        </div><!-- end page-search-form -->


                        <div class="row">
                            @foreach($flights as $flight)
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="grid-block main-block f-grid-block">
                                    @php
                                        $start = session('lang') . '_start';
                                        $dest = session('lang') . '_destination';
                                    @endphp
                                    <a href="{{ url('flight/' . $flight->id) }}">
                                        <div class="main-img f-img">
                                            <img src="{{ $flight->flight_image }}" class="img-fluid" alt="flight-img" />
                                        </div><!-- end f-img -->
                                    </a>
                                    <ul class="list-unstyled list-inline offer-price-1">
                                        <li class="price">{{ __('home.le') }} {{ $flight->price }}<span class="divider">|</span>
                                            <span class="pkg">
                                                {{ $flight->status == 0 ? __('admin.one_way') : __('admin.two_way') }}
                                            </span>
                                        </li>
                                    </ul>

                                    <div class="block-info f-grid-info">
                                        <div class="f-grid-desc">
                                                <span class="f-grid-time"><i class="fa fa-clock-o"></i>
                                                    @php
                                                        $t1 = strtotime($flight->landing_time);
                                                        $t2 = strtotime($flight->take_off_time);
                                                        $hours = (($t1-$t2)/60)/60;
                                                        $minutes = floor(($hours - floor($hours)) * 60);
                                                    @endphp
                                                    {{ __('home.hour') }} {{ floor($hours) }}  : {{ $minutes }} {{ __('home.minute') }}
                                                </span>
                                            <h3 class="block-title">
                                                <a href="{{ url('flight/' . $flight->id) }}">
                                                    {{ $flight->$start }} {{ __('admin.to') }} {{ $flight->$dest }}
                                                </a>
                                            </h3>
                                            <p class="block-minor">
                                                {{ $flight->status == 0 ? __('admin.one_way') : __('admin.two_way') }}
                                            </p>
                                        </div><!-- end f-grid-desc -->

                                        <div class="f-grid-timing">
                                            <ul class="list-unstyled">
                                                <li><span><i class="fa fa-plane"></i></span>
                                                    <span class="date">
                                                        {{ date('M,d-Y', strtotime($flight->take_off)) }}
                                                    </span>
                                                    ( {{ date('g:i A', strtotime($flight->take_off_time)) }} )
                                                </li>
                                                <li><span><i class="fa fa-plane"></i></span>
                                                    <span class="date">
                                                        {{ date('M,d-Y', strtotime($flight->landing)) }}
                                                    </span>
                                                    ( {{ date('g:i A', strtotime($flight->landing_time)) }} )
                                                </li>
                                            </ul>
                                        </div><!-- end flight-timing -->

                                        <div class="grid-btn">
                                            <a href="{{ url('flight/' . $flight->id) }}"
                                               class="btn btn-orange btn-block btn-lg">{{ __('home.read_more') }}</a>
                                        </div><!-- end grid-btn -->
                                    </div><!-- end f-grid-info -->
                                </div><!-- end f-grid-block -->
                            </div><!-- end columns -->
                            @endforeach
                        </div><!-- end row -->
                        {{ $flights->appends(request()->query())->links() }}
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end search-result-page -->
    </section><!-- end innerpage-wrapper -->


@endsection
