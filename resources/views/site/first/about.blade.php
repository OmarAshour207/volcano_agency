@extends('site.first.layouts.app')

@section('content')
    <!--============= PAGE-COVER =============-->
    <section class="page-cover" id="cover-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">{{ __('home.about_us') }}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('home.about_us') }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <!--===== INNERPAGE-WRAPPER ====-->
    @php
        $title = session('lang') . '_title';
        $desc = session('lang') . '_description';
    @endphp
    <section class="innerpage-wrapper">
        <div id="about-us">
            <div id="about-content" class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="flex-content">
                                <div class="flex-content-img about-img">
                                    <img src="{{ $aboutUs->about_image }}" class="img-fluid" alt="about-img" />
                                </div><!-- end about-img -->
                                <div class="about-text">
                                    <div class="about-detail">
                                        <h2>{{ $aboutUs->$title }}</h2>
                                        <p>{{ $aboutUs->$desc }}</p>
                                    </div><!-- end about-detail -->
                                </div><!-- end about-text -->
                            </div><!-- end flex-content -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end about-content -->
            <div id="video-banner" class="banner-padding back-size">
                <div class="container">
                    <div class="row">
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
            </div><!-- end video-banner -->

            <div id="team" class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-heading">
                                <h2>{{ __('home.meet_team') }}</h2>
                                <hr class="heading-line" />
                            </div><!-- end page-heading -->
                            <div class="owl-carousel owl-theme" id="owl-team">
                                @php
                                    $title = session('lang') . '_title';
                                    $name = session('lang') . '_name';
                                @endphp
                                @foreach($teamMembers as $index => $teamMember)
                                <div class="item">
                                    <div class="member-block">
                                        <div class="member-img">
                                            <img src="{{ $teamMember->member_image }}" class="img-fluid rounded-circle"
                                                 alt="member-img" />
                                            <ul class="list-unstyled list-inline contact-links">
                                                @php
                                                    $socialSites = ['facebook', 'twitter', 'instagram'];
                                                @endphp
                                                @for($i = 0; $i < count($socialSites); $i++)
                                                    @if(setting($socialSites[$i]) != '')
                                                        <li class="list-inline-item">
                                                            <a href="{{ setting($socialSites[$i]) }}">
                                                                <span> <i class="fa fa-{{ $socialSites[$i] }}"></i> </span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endfor
                                            </ul>
                                        </div><!-- end member-img -->
                                        <div class="member-name">
                                            <h3>{{ $teamMember->$name }}</h3>
                                            <p>{{ $teamMember->$title }}</p>
                                        </div><!-- end member-name -->
                                    </div><!-- end member-block -->
                                </div><!-- end item -->
                                @endforeach
                            </div><!-- end owl-team -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end team -->
        </div><!-- end about-us -->
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
