@extends('site.first.layouts.app')

@section('content')
    <!--================== PAGE-COVER =================-->
    <section class="page-cover" id="cover-tour-grid-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ __('admin.hotels') }}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('admin.hotels') }}</li>
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
                                            <select class="form-control" name="hotel_id">
                                                @php
                                                    $name = session('lang') . '_name';
                                                @endphp
                                                <option value=""> {{ __('admin.choose_hotel') }} </option>
                                                @foreach($hotels as $hotel)
                                                    <option value="{{ $hotel->id }}" {{ $hotel->id == request('hotel_id') ? 'selected' : '' }}> {{ $hotel->$name }} </option>
                                                @endforeach
                                            </select>
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->
                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="date" name="check_in" value="{{ request('check_in') }}" class="form-control" placeholder="{{ __('admin.check_in') }}">
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->

                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="date" name="check_out" class="form-control" value="{{ request('check_out') }}" placeholder="{{ __('admin.check_out') }}">
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->

                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="number" name="rooms" class="form-control" value="{{ request('rooms') }}" placeholder="{{ __('admin.rooms') }}">
                                        </div><!-- end card-header -->
                                    </div><!-- end panel-default -->

                                    <div class="card">
                                        <div class="card-header form-group">
                                            <input type="number" name="adults" class="form-control" value="{{ request('adults') }}" placeholder="{{ __('admin.adults') }}">
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
                        @foreach($offers as $index => $offer)
                            <div class="list-block main-block t-list-block">
                                @php
                                    $name = session('lang') . '_name';
                                    $desc = session('lang') . '_description';
                                @endphp
                                <div class="list-content">
                                    <div class="main-img list-img t-list-img">
                                        <a href="{{ url('offer/' . $offer->id ) }}">
                                            <img src="{{ $hotel->hotel_image }}" class="img-fluid" alt="tour-img" />
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="list-inline-item price">{{ __('home.le') }} {{ $offer->price }}<span
                                                        class="divider">|</span>
                                                    <span class="pkg">
                                                    @php
                                                        $diff = strtotime($offer->check_out) - strtotime($offer->check_in);
                                                    @endphp
                                                        {{ round($diff / (3600 * 24)) }}
                                                        {{ __('home.day') }}
                                                </span>
                                                </li>
                                                <li class="list-inline-item rating">
                                                    @for($i = 0;$i < $offer->hotel->stars_number; $i++)
                                                        <span><i class="fa fa-star orange"></i></span>
                                                    @endfor
                                                </li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end t-list-img -->

                                    <div class="list-info t-list-info">
                                        <h3 class="block-title"><a href="{{ url('offer/' . $offer->id) }}">{{ $offer->hotel->$name }}</a></h3>
                                        <p class="block-minor">{{ $offer->hotel->$desc }}</p>
                                        <p> {{ substr($offer->hotel->$desc, 0, 70) }} </p>
                                        <a href="{{ url('offer/' . $offer->id) }}" class="btn btn-orange btn-lg">
                                            {{ __('home.learn_more') }}
                                        </a>
                                    </div><!-- end t-list-info -->
                                </div><!-- end list-content -->
                            </div><!-- end t-list-block -->
                        @endforeach

                        <div class="pages pagination-margin">
                            <ol class="pagination justify-content-center">
                                {{ $offers->appends(request()->query())->links() }}
                            </ol>
                        </div><!-- end pages -->
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end tour-listing -->
    </section><!-- end innerpage-wrapper -->


@endsection
