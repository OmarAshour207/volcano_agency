@extends('site.first.layouts.app')

@section('content')
    <!--================== PAGE-COVER ================-->
    <section class="page-cover" id="cover-tour-booking">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ __('home.trip_booking') }}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('home.trip_booking') }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="flight-booking" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-7 col-xl-8 content-side">
                        @if (session('success'))
                            <h3 class="alert alert-success"> {{ __('home.sent_successfully') }} </h3>
                        @endif
                        <form class="lg-booking-form" id="frm_booking" name="frm_booking" method="post" action="{{ url('trip/book') }}">
                            @csrf
                            <div class="lg-booking-form-heading">
                                <span>1</span>
                                <h3>{{ __('admin.contact_info') }}</h3>
                            </div><!-- end lg-bform-heading -->

                            <div class="personal-info">

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('admin.full_name') }}</label>
                                            <input type="text" class="form-control" id="txt_name" name="name" value="{{ old('name') }}"/>
                                        </div>
                                    </div><!-- end columns -->

                                </div><!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('home.phone') }}</label>
                                            <input type="text" class="form-control" id="txt_phone" name="phone" />
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('home.email') }} ({{ __('home.optional') }})</label>
                                            <input type="email" class="form-control" id="txt_email" name="email" />
                                        </div>
                                    </div><!-- end columns -->
                                </div><!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('home.address') }}</label>
                                            <textarea type="text" class="form-control" rows="2" id="txt_address" name="address"></textarea>
                                        </div>
                                    </div><!-- end columns -->
                                </div>
                            </div><!-- end personal-info -->


                            <div class="checkbox">
                                <label>
                                    {{ __('home.confirm_customer_service') }}
                                </label>
                            </div><!-- end checkbox -->
                            <div class="col-md-12 text-center" id="result_msg"></div>
                            <button type="submit" class="btn btn-orange" id="submit">{{ __('home.book') }}</button>
                        </form>

                    </div><!-- end columns -->

                    <div class="col-12 col-md-12 col-lg-5 col-xl-4 side-bar right-side-bar">
                        <div class="row">

                            <div class="col-12 col-md-6 col-lg-12">
                                @php
                                    $title = session('lang') . '_title';
                                    $desc = session('lang') . '_description';
                                    $dest = session('lang') . '_destination';
                                @endphp
                                <div class="side-bar-block detail-block style2 text-center">
                                    <div class="detail-img text-center">
                                        <a href="#"><img src="{{ $trip->trip_image }}" class="img-fluid" alt="detail-img" /></a>
                                        <div class="detail-title">
                                            <h4><a href="#">{{ $trip->$title }}</a></h4>
                                            <p>{!! $trip->$desc !!}</p>
                                        </div><!-- end detail-title -->

                                        <span class="detail-price">
                                                <h4>{{ __('home.le') }} {{ $trip->price }} <span>/ {{ __('home.avg_night') }}</span></h4>
                                            </span>
                                    </div><!-- end detail-img -->

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>{{ __('admin.start_at') }}</td>
                                                <td>{{ date('d,M-Y', strtotime($trip->start_at)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.end_at') }}</td>
                                                <td>{{ date('d,M-Y', strtotime($trip->end_at)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('home.duration') }}</td>
                                                @php
                                                    $diff = strtotime($trip->end_at) - strtotime($trip->start_at);
                                                @endphp
                                                <td>
                                                    {{ round($diff / (3600 * 24)) }}
                                                    {{ __('home.day') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.price') }}</td>
                                                <td>{{ __('home.le') }} {{ $trip->price }} </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div><!-- end table-responsive -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->

                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="side-bar-block support-block">
                                    <h3>{{ __('home.for_help') }}</h3>
                                    <p> {{ setting('address') }} </p>
                                    <div class="support-contact">
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>{{ __('home.phone') }}</p>
                                    </div><!-- end support-contact -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->

                        </div><!-- end row -->

                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end flight-booking -->
    </section><!-- end innerpage-wrapper -->


@endsection
