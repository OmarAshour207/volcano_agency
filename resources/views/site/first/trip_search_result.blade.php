@extends('site.first.layouts.app')

@section('content')
    <!--================== PAGE-COVER =================-->
    <section class="page-cover" id="cover-tour-grid-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ __('admin.trips') }}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('admin.trips') }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="tour-listing" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-3 side-bar left-side-bar">

                        <div class="side-bar-block filter-block">
                            <h3>{{ __('home.filter') }}</h3>

                            <form>
                                <div class="panels-group">
                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="text" name="start" value="{{ request('start') }}" class="form-control" placeholder="{{ __('home.start') }}">
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->
                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="text" name="destination" value="{{ request('destination') }}" class="form-control" placeholder="{{ __('home.destination') }}">
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->

                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="date" name="start_at" class="form-control" value="{{ request('start_at') }}" placeholder="{{ __('admin.start_at') }}">
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->

                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="number" name="price_from" class="form-control" value="{{ request('price_from') }}" placeholder="{{ __('home.price_from') }}">
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->

                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="number" name="price_to" class="form-control" value="{{ request('price_to') }}" placeholder="{{ __('home.price_to') }}">
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->

                                    <div class="card text-white">
                                        <button type="submit" class="btn btn-warning text-white">
                                            {{ __('home.search') }}
                                        </button>
                                    </div><!-- end panel-default -->

                                </div><!-- end panel-group -->

                            </form>
                        </div><!-- end side-bar-block -->

                    </div><!-- end columns -->

                    <div class="col-12 col-md-12 col-lg-9 col-xl-9 content-side">
                        @foreach($trips as $index => $trip)
                        <div class="list-block main-block t-list-block">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                                $dest = session('lang') . '_destination';
                            @endphp
                            <div class="list-content">
                                <div class="main-img list-img t-list-img">
                                    <a href="{{ url('trip/' . $trip->id . '/' . $trip->$title) }}">
                                        <img src="{{ $trip->trip_image }}" class="img-fluid" alt="tour-img" style="width: 100% !important;"/>
                                    </a>
                                    <div class="main-mask">
                                        <ul class="list-unstyled list-inline offer-price-1">
                                            <li class="list-inline-item price">{{ __('home.le') }} {{ $trip->price }}<span
                                                    class="divider">|</span>
                                                <span class="pkg">
                                                    @php
                                                        $diff = strtotime($trip->end_at) - strtotime($trip->start_at);
                                                    @endphp
                                                    {{ round($diff / (3600 * 24)) }}
                                                    {{ __('home.day') }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div><!-- end main-mask -->
                                </div><!-- end t-list-img -->

                                <div class="list-info t-list-info">
                                    <h3 class="block-title"><a href="{{ url('trip/' . $trip->id. '/' . $trip->$title) }}">{{ $trip->$dest }}</a></h3>
                                    <p class="block-minor">{{ $trip->$title }}</p>
                                    {!! substr($trip->$desc, 0, 70) !!}
                                    <a href="{{ url('trip/' . $trip->id. '/' . $trip->$title) }}" class="btn btn-orange btn-lg">
                                        {{ __('home.learn_more') }}
                                    </a>
                                </div><!-- end t-list-info -->
                            </div><!-- end list-content -->
                        </div><!-- end t-list-block -->
                        @endforeach

                        <div class="pages pagination-margin">
                            <ol class="pagination justify-content-center">
                                {{ $trips->appends(request()->query())->links() }}
                            </ol>
                        </div><!-- end pages -->
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end tour-listing -->
    </section><!-- end innerpage-wrapper -->


@endsection
