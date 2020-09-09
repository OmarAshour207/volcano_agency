@extends('site.first.layouts.app')

@section('content')

    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        <div id="contact-us-2">

            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509729.487836256!2d-123.77686152799836!3d37.1864783963941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia!5e0!3m2!1sen!2s!4v1490695907554"
                    allowfullscreen></iframe>
            </div><!-- end map -->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="contact-block-2">
                                    <span class="border-shape-top"></span>
                                    <span><i class="fa fa-map-marker"></i></span>
                                    <h4>{{ __('home.address') }}</h4>
                                    <p>{{ setting(session('lang') . '_address') }}</p>
                                    <span class="border-shape-bot"></span>
                                </div><!-- end contact-block-2 -->
                            </div><!-- end columns -->

                            <div class="col-12 col-md-4">
                                <div class="contact-block-2">
                                    <span class="border-shape-top"></span>
                                    <span><i class="fa fa-envelope"></i></span>
                                    <h4>{{ __('home.email_contact') }}</h4>
                                    <p>{{ setting('email') }}</p>
                                    <span class="border-shape-bot"></span>
                                </div><!-- end contact-block-2 -->
                            </div><!-- end columns -->

                            <div class="col-12 col-md-4">
                                <div class="contact-block-2">
                                    <span class="border-shape-top"></span>
                                    <span><i class="fa fa-phone"></i></span>
                                    <h4>{{ __('home.phone') }}</h4>
                                    <p>{{ setting('phone') }}</p>
                                    <span class="border-shape-bot"></span>
                                </div><!-- end contact-block-2 -->
                            </div><!-- end columns -->
                        </div><!-- end row -->

                        <div id="contact-form-2" class="innerpage-section-padding">
                            <div class="row">
                                <div class="col-12 col-md-12 col-xl-10 mx-auto">
                                    <div class="page-heading">
                                        <h2>{{ __('home.contact_us') }}</h2>
                                        <hr class="heading-line" />
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6 contact-form-2-text">
                                            <p><strong>{{ __('home.about_us') }}:</strong>
                                                @php
                                                $desc = session('lang') . '_description';
                                                @endphp
                                                {{ $aboutUs->$desc }}
                                            </p>
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

                                        </div>

                                        <div class="col-12 col-md-6">

                                            <form id="frm_contact" name="frm_contact" method="post" action="{{ route('send.contact') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="{{ __('admin.full_name') }}" name="name" id="txt_name" />
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" placeholder="{{ __('home.email_contact') }}" name="email" id="txt_email" />
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="{{ __('home.phone') }}" name="phone" id="txt_phone" />
                                                </div>

                                                <div class="form-group">
                                                    <textarea class="form-control" rows="4" placeholder="{{ __('home.message') }}" name="message" id="txt_message"></textarea>
                                                </div>
                                                <div class="col-md-12 text-center" id="result_msg"></div>
                                                <div class="text-center">
                                                    <button name="submit" id="submit" class="btn btn-orange">{{ __('home.send') }}</button>
                                                </div>
                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end contact-us -->
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
