@extends('site.first.layouts.app')

@section('content')
    <!--================= PAGE-COVER ================-->
    <section class="page-cover" id="cover-blog-listing">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">{{ __('home.latest_blog') }}</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                        <li class="breadcrumb-item">{{ __('home.blogs') }}</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->


    <!--==== INNERPAGE-WRAPPER =====-->
    <section class="innerpage-wrapper">
        <div id="blog-listings" class="innerpage-section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-3 col-xl-3 side-bar blog-sidebar left-side-bar">

                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="side-bar-block contact">
                                    <h2 class="side-bar-heading">{{ __('admin.contact_us') }}</h2>
                                    <div class="c-list">
                                        <div class="icon"><span><i class="fa fa-envelope"></i></span></div>
                                        <div class="text">
                                            <p>{{ setting('email') }}</p>
                                        </div>
                                    </div><!-- end c-list -->

                                    <div class="c-list">
                                        <div class="icon"><span><i class="fa fa-phone"></i></span></div>
                                        <div class="text">
                                            <p>{{ setting('phone') }}</p>
                                        </div>
                                    </div><!-- end c-list -->

                                    <div class="c-list">
                                        <div class="icon"><span><i class="fa fa-map-marker"></i></span></div>
                                        <div class="text">
                                            <p>{{ setting(session('lang') . '_address') }}</p>
                                        </div>
                                    </div><!-- end c-list -->
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->

                        </div><!-- end row -->

                        <div class="row">

                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="side-bar-block follow-us">
                                    <h2 class="side-bar-heading">{{ __('home.follow_us') }}</h2>
                                    <ul class="list-unstyled list-inline">

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
                                </div><!-- end side-bar-block -->
                            </div><!-- end columns -->


                        </div><!-- end row -->
                    </div><!-- end columns -->

                    <div class="col-12 col-md-12 col-lg-9 col-xl-9 content-side">
                        <div class="space-right">

                            @php
                                $title = session('lang') . '_title';
                                $content = session('lang') . '_content';
                                $author = session('lang') . '_author';
                            @endphp
                            @foreach($blogs as $blog)
                                <div class="main-block blog-post blog-list">
                                    <div class="main-img blog-post-img">
                                        <a href="{{ route('blog.show', ['id'  => $blog->id, 'title' => $blog->$title]) }}">
                                            <img src="{{ $blog->blog_image }}" class="img-fluid"
                                                 alt="blog-post-image" />
                                        </a>
                                        <div class="main-mask blog-post-info">
                                            <ul class="list-inline list-unstyled blog-post-info">
                                                <li class="list-inline-item"><span><i
                                                            class="fa fa-calendar"></i></span>
                                                    {{ date('d,M-Y', strtotime($blog->create_at)) }}
                                                </li>
                                                <li class="list-inline-item"><span><i class="fa fa-user"></i></span>{{ __('home.by') }}:
                                                    <a href="{{ route('blog.show', ['id'  => $blog->id, 'title' => $blog->$title]) }}">{{ $blog->$author }}</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- end blog-post-img -->

                                    <div class="blog-post-detail">
                                        <h2 class="blog-post-title">
                                            <a href="{{ route('blog.show', ['id'  => $blog->id, 'title' => $blog->$title]) }}">
                                                {{ $blog->$title }}
                                            </a>
                                        </h2>
                                        {!! $blog->content !!}
                                        <a href="{{ route('blog.show', ['id'  => $blog->id, 'title' => $blog->$title]) }}" class="btn btn-orange">
                                            {{ __('home.read_more') }}
                                        </a>
                                    </div><!-- end blog-post-detail -->
                                </div><!-- end blog-post -->
                            @endforeach
                            <div class="pages">
                                <ol class="pagination justify-content-center">
                                    {{ $blogs->appends(request()->query())->links() }}
                                </ol>
                            </div><!-- end pages -->

                        </div><!-- end space-right -->
                    </div><!-- end columns -->

                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end blog-listings -->
    </section><!-- end innerpage-wrapper -->

@endsection
