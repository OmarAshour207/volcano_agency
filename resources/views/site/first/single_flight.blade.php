@extends('site.first.layouts.app')

@section('content')

    <!--=============== PAGE-COVER =============-->
    <section class="page-cover" id="cover-flight-booking">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Flight Booking Left Sidebar</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Flight Booking Left Sidebar</li>
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
                    <div class="col-12 col-md-12 col-lg-5 col-xl-4 side-bar left-side-bar">
                        <div class="row">

                            @php
                                $start = session('lang') . '_start';
                                $dest = session('lang') . '_destination';
                            @endphp

                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="side-bar-block detail-block style1 text-center">
                                    <div class="detail-img text-center">
                                        <a href="#">
                                            <img src="{{ $flight->flight_image }}" class="img-fluid" />
                                        </a>
                                    </div><!-- end detail-img -->

                                    <div class="detail-title">
                                        <h4><a href="#">{{ $flight->$start }} {{ __('admin.to') }} {{ $flight->$dest }}</a></h4>
                                        <p>{{ $flight->status == 0 ? __('admin.one_way') : __('admin.two_way') }}</p>

                                    </div><!-- end detail-title -->

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>
                                                <td>{{ __('admin.from') }}</td>
                                                <td>{{ $flight->$start }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.to') }}</td>
                                                <td>{{ $flight->$dest }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('admin.take_off') }}</td>
                                                <td>{{ date('d-m-Y', strtotime($flight->take_off)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.take_off_time') }}</td>
                                                <td>{{ date('g:i A', strtotime($flight->take_off_time)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.landing') }}</td>
                                                <td>{{ date('d-m-Y', strtotime($flight->landing)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.landing_time') }}</td>
                                                <td>{{ date('g:i A', strtotime($flight->landing_time)) }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('admin.adults') }}</td>
                                                <td>{{ $flight->adults }}</td>
                                            </tr>

                                            <tr>
                                                <td>{{ __('home.flight_duration') }}</td>
                                                @php
                                                    $t1 = strtotime($flight->landing_time);
                                                    $t2 = strtotime($flight->take_off_time);
                                                    $hours = (($t1-$t2)/60)/60;
                                                    $minutes = floor(($hours - floor($hours)) * 60);
                                                @endphp
                                                <td> {{ __('home.hour') }} {{ floor($hours) }} : {{ $minutes }} {{ __('home.minute') }} </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.price') }}</td>
                                                <td> {{ __('home.le') }} {{ $flight->price }} </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- end table-responsive -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->

                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="side-bar-block support-block">
                                    <h3>{{ __('home.for_help') }}</h3>
                                    <p>{{ setting('address') }}</p>
                                    <div class="support-contact">
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>{{ setting('phone') }}</p>
                                    </div><!-- end support-contact -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->

                        </div><!-- end row -->

                    </div><!-- end columns -->


                    <div class="col-12 col-md-12 col-lg-7 col-xl-8 content-side">
                        @if (session('success'))
                            <h3 class="alert alert-success"> {{ __('home.sent_successfully') }} </h3>
                        @endif
                        <form class="lg-booking-form" id="frm_booking" action="{{ url('flight/book') }}" method="post">
                            @csrf

                            <input type="hidden" value="{{ request()->route('id') }}" name="flight_id">
                            <div class="lg-booking-form-heading">
                                <span>1</span>
                                <h3>{{ __('home.contact_info') }}</h3>
                            </div><!-- end lg-bform-heading -->

                            <div class="personal-info">

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                            <label>{{ __('admin.full_name') }}</label>
                                            <input type="text" class="form-control" id="txt_last_name" name="name">
                                    </div><!-- end columns -->
                                </div><!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('home.email') }} {{ __('home.optional') }}</label>
                                            <input type="email" class="form-control" id="txt_email" name="email" />
                                        </div>
                                    </div><!-- end columns -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('home.phone') }}</label>
                                            <input type="text" class="form-control" id="txt_phone" name="phone" />
                                        </div>
                                    </div><!-- end columns -->
                                </div><!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('home.address') }}</label>
                                            <textarea class="form-control" rows="2" id="txt_address" name="address"></textarea>
                                        </div>
                                    </div><!-- end columns -->
                                </div>
                            </div><!-- end personal-info -->

                            <div class="checkbox">
                                <label> {{ __('home.confirm_customer_service') }} </label>
                            </div><!-- end checkbox -->
                            <div class="col-md-12 text-center" id="result_msg"></div>
                            <button type="submit" class="btn btn-orange" name="submit" id="submit">
                                {{ __('home.book') }}
                            </button>
                        </form>
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end flight-booking -->
    </section><!-- end innerpage-wrapper -->

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
