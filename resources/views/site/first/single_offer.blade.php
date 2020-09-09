@extends('site.first.layouts.app')

@section('content')

    <!--================== PAGE-COVER ================-->
    <section class="page-cover" id="cover-hotel-booking">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ __('admin.hotels_offers') }}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('admin.hotels_offers') }}</li>
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

                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="side-bar-block detail-block style2 text-center">
                                    <div class="detail-img text-center">
                                        <a href="#"><img src="{{ $offer->hotel->hotel_image }}" class="img-fluid" alt="detail-img" /></a>
                                        <div class="detail-title">
                                            @php
                                                $name = session('lang') . '_name';
                                            @endphp
                                            <h4><a href="#">{{ $offer->hotel->$name }}</a></h4>
                                        </div><!-- end detail-title -->

                                        <span class="detail-price">
                                                <h4>{{ __('home.le') }} {{ $offer->price }} <span>/ {{ __('home.avg_night') }}</span></h4>
                                            </span>
                                    </div><!-- end detail-img -->

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>{{ __('home.rating') }}</td>
                                                <td>
                                                    <div class="rating">
                                                        @for ($i = 0; $i < $offer->hotel->stars_number; $i++)
                                                            <span><i class="fa fa-star"></i></span>
                                                        @endfor
                                                    </div><!-- end rating -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.check_in') }}</td>
                                                <td>{{ date('d,M-Y' , strtotime($offer->check_in)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.check_out') }}</td>
                                                <td>{{ date('d,M-Y' , strtotime($offer->check_out)) }}</td>
                                            </tr>
                                            @php
                                                $diff = strtotime($offer->check_out) - strtotime($offer->check_in);
                                            @endphp
                                            <tr>
                                                <td>{{ __('home.day') }}</td>
                                                <td>{{ round($diff / (3600 * 24)) }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.rooms') }}</td>
                                                <td>{{ $offer->rooms }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.adults') }}</td>
                                                <td>{{ $offer->adults }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('admin.price') }}</td>
                                                <td>{{ __('home.le') }} {{ $offer->price }}</td>
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
                        <form class="lg-booking-form" id="frm_booking" name="frm_booking" method="post" action="{{ url('hotel/book') }}">
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
                                            <input type="text" class="form-control" id="txt_name" name="name" />
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
                                <label>{{ __('home.confirm_customer_service') }}</label>
                            </div><!-- end checkbox -->
                            <div class="col-md-12 text-center" id="result_msg"></div>
                            <button type="submit" class="btn btn-orange" name="submit" id="submit">{{ __('home.book') }}</button>
                        </form>

                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end flight-booking -->
    </section><!-- end innerpage-wrapper -->


@endsection
