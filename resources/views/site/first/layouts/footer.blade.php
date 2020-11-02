<!--======================= FOOTER =======================-->
<section id="footer" class="ftr-heading-o ftr-heading-mgn-1">

    <div id="footer-top" class="banner-padding ftr-top-grey ftr-text-white">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-3 col-xl-3 footer-widget ftr-contact">
                    <h3 class="footer-heading">{{ __('home.contact_us') }}</h3>
                    <ul class="list-unstyled">
                        <li><span><i class="fa fa-map-marker"></i></span>{{ setting(session('lang') . '_address') }}</li>
                        <li><span><i class="fa fa-phone"></i></span>{{ setting('phone') }}</li>
                        <li><span><i class="fa fa-envelope"></i></span>{{ setting('email') }}</li>
                    </ul>
                </div><!-- end columns -->

                <div class="col-12 col-md-6 col-lg-2 col-xl-2 footer-widget ftr-links">
                    <h3 class="footer-heading">{{ __('home.quick_links') }}</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('about') }}">{{ trans('home.about_us') }}</a></li>
                        <li><a href="{{ url('services') }}">{{ trans('home.our_services') }}</a></li>
                        <li><a href="{{ url('projects') }}">{{ trans('home.our_projects') }}</a></li>
                        <li><a href="{{ url('contact-us') }}">{{ trans('home.contact_us') }}</a></li>
                        <li><a href="{{ url('blogs') }}">{{ trans('home.blogs') }}</a></li>
                    </ul>
                </div><!-- end columns -->

                <div class="col-12 col-md-6 col-lg-3 col-xl-3 footer-widget ftr-links ftr-pad-left">
                    <h3 class="footer-heading">{{ __('admin.services') }}</h3>
                    <ul class="list-unstyled">
                        @php
                            $title = session('lang') . '_title';
                        @endphp
                        @foreach($services as $index => $service)
                            <li>
                                <a href="{{ url('services/' . $service->id . '/' . $service->$title) }}">
                                    {{ $service->$title }}
                                </a>
                            </li>
                            @if($index == 6)
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div><!-- end columns -->

                <div class="col-12 col-md-6 col-lg-4 col-xl-4 footer-widget ftr-about">
                    <h3 class="footer-heading">{{ __('home.about_us') }}</h3>
                    @php
                        $desc = session('lang') . '_description';
                    @endphp
                    <p>{{ $aboutUs->$desc }}</p>
                    <ul class="social-links list-inline list-unstyled">
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
                </div><!-- end columns -->

            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end footer-top -->

</section><!-- end footer -->


<div id="popup-ad" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="popup-ad-text">
                            <h4>Get</h4>
                            <h2><span>20%</span> off</h2>
                            <h4>on all flights booking</h4>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset
                                pri.</p>
                            <a href="{{ url('trips') }}" class="btn btn-orange">{{ __('home.book_flight') }}</a>
                        </div><!-- end popup-ad-text -->
                    </div><!-- end columns -->

                    <div class="col-12 col-md-6">
                        <div class="popup-ad-img">
                            <img src="{{ asset('site/images/about-content-2.png') }}" class="img-fluid" />
                        </div><!-- end popup-ad-img -->
                    </div><!-- end columns -->
                </div><!-- end row -->

            </div><!-- end modal-bpdy -->
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div><!-- end popup-ad -->
