@extends('site.first.layouts.app')

@section('content')
    <div class="page-content bg-white">
        <div class="content-block">
            <!-- Our Projects  -->
            <div class="section-full bg-gray content-inner about-carousel-ser">
                <div class="container">
                    <div class="about-ser-carousel owl-carousel owl-theme owl-btn-center-lr owl-dots-primary-full owl-btn-3 m-b30 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s">
                        @foreach($projects as $project)
                        <div class="item">
                            @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                            @endphp
                            <div class="dlab-box service-media-bx">
                                <div class="dlab-media">
                                    <a href="{{ url('about') }}">
                                        <img src="{{ $project->project_image }}" class="lazy" data-src="{{ $project->project_image }}" alt="">
                                    </a>
                                </div>
                                <div class="dlab-info text-center">
                                    <h2 class="dlab-title">{{ $project->$title }}</h2>
                                    <p> {{ $project->$desc }} </p>
                                    <a href="#" class="site-button btnhover13">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Our Projects END -->

            <!-- About Company -->
            <div class="section-full bg-img-fix content-inner-2 overlay-black-dark contact-action style2" style="background-image:url({{ asset('site/images/background/bg2.jpg') }});">
                <div class="container">
                    <div class="row relative">
                        <div class="col-md-12 col-lg-8 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                            <div class="contact-no-area">
                                @php
                                $desc = session('lang') . '_description';
                                @endphp
                                <h2 class="title">{{ $about->$desc ?? '' }}</h2>
                                <div class="contact-no">
                                    <div class="contact-left">
                                        <h3 class="no"><i class="sl-call-in"></i>{{ setting('phone') }}</h3>
                                    </div>
                                    <div class="contact-right">
                                        <a href="{{ url('contact') }}" class="site-button appointment-btn btnhover13">{{ __('home.contact_us') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 contact-img-bx wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                            <img src="{{ $about->about_image ?? '' }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Company END -->
        </div>
    </div>
    <br>
@endsection
