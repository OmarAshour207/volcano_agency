<!--======== SEARCH-OVERLAY =========-->
<div id="myOverlay" class="overlay">
    <span class="closebtn" onClick="closeSearch()" title="Close Overlay">×</span>
    <div class="overlay-content">

        <form>
            <div class="form-group">
                <div class="input-group">
                    <input class="float-left" type="text" placeholder="{{ __('home.search') }}" name="search">
                    <button class="float-left" type="submit"><i class="fa fa-search"></i></button>
                </div><!-- end input-group -->
            </div><!-- end form-group -->
        </form>

    </div><!-- end overlay-content -->
</div><!-- end overlay -->


<!--============= TOP-BAR ===========-->
<div id="top-bar" class="tb-text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div id="info">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item"><span><i class="fa fa-map-marker"></i></span>
                            {{ setting('address') }}
                        </li>
                        <li class="list-inline-item"><span><i class="fa fa-phone"></i></span>{{ setting('phone') }}</li>
                    </ul>
                </div><!-- end info -->
            </div><!-- end columns -->
            <div class="col-12 col-md-6">
                <div id="links">
                    <ul class="list-unstyled list-inline">

                    </ul>
                </div><!-- end links -->
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end top-bar -->

<nav class="navbar navbar-expand-xl navbar-custom main-navbar p-1" id="mynavbar-1">
    <div class="container">

        <a href="{{ url('/') }}" class="navbar-brand py-1 m-0"><span><i class="fa fa-plane"></i>STAR</span>TRAVELS</a>
        <div class="header-search d-xl-none my-auto mr-auto py-1">
            <a href="#" class="search-button" onClick="openSearch()"><span><i
                        class="fa fa-search"></i></span></a>
        </div>
        <button class="navbar-toggler mr-2" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation" id="sidebarCollapse">
            <i class="fa fa-navicon py-1"></i>
        </button>

        <div class="collapse navbar-collapse" id="myNavbar1">
            <ul class="navbar-nav mr-auto navbar-search-link">
                <li class="nav-item {{ setActiveHome('') }}">
                    <a href="{{ url('/') }}" class="nav-link" role="button">
                        {{ __('home.home') }}
                    </a>
                </li>
                <li class="nav-item {{ setActive('trips') }}">
                    <a href="{{ url('trips') }}" class="nav-link">
                        {{ __('admin.trips') }}
                    </a>
                </li>

                <li class="nav-item {{ setActive('hotels') }}">
                    <a href="{{ url('hotels') }}" class="nav-link">
                        {{ __('admin.hotels') }}
                    </a>
                </li>

                <li class="nav-item {{ setActive('flights') }}">
                    <a href="{{ url('flights') }}" class="nav-link">
                        {{ __('admin.flights') }}
                    </a>
                </li>
                <li class="nav-item {{ setActive('services') }}">
                    <a href="{{ url('services') }}" class="nav-link">
                        {{ __('home.our_services') }}
                    </a>
                </li>
                <li class="nav-item {{ setActive('about') }}">
                    <a href="{{ url('about') }}" class="nav-link">
                        {{ __('home.about_us') }}
                    </a>
                </li>
                <li class="nav-item {{ setActive('blogs') }}">
                    <a href="{{ url('blogs') }}" class="nav-link">
                        {{ __('home.blogs') }}
                    </a>
                </li>
                <li class="nav-item {{ setActive('contact-us') }}">
                    <a href="{{ url('contact-us') }}" class="nav-link">
                        {{ __('home.contact_us') }}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown">{{ __('home.language') }}<span><i
                                class="fa fa-angle-down"></i></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ url('lang/en') }}">
                                {{ __('home.english') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('lang/en') }}">
                                {{ __('home.arabic') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown-item search-btn">
                    <a href="#" class="search-button" onClick="openSearch()"><span><i
                                class="fa fa-search"></i></span></a>
                </li>
            </ul>
        </div><!-- end navbar collapse -->
    </div><!-- End container -->
</nav>

<div class="sidenav-content">
    <!-- Sidebar  -->
    <nav id="sidebar" class="sidenav">
        <h2 id="web-name"><span><i class="fa fa-plane"></i></span>Star Travel</h2>

        <div id="main-menu">
            <div id="dismiss">
                <button class="btn" id="closebtn">&times;</button>
            </div>
            <div class="list-group panel">
                <a class="items-list {{ setActiveHome('/') }}" href="{{ url('/') }}" >
                    {{ __('home.home') }}
                </a>

                <a class="items-list {{ setActive('trips') }}" href="{{ url('trips') }}" >
                    {{ __('home.trips') }}
                </a>

                <a class="items-list {{ setActive('services') }}" href="{{ url('services') }}" >
                    {{ __('home.our_services') }}
                </a>

                <a class="items-list {{ setActive('projects') }}" href="{{ url('projects') }}" >
                    {{ __('home.our_projects') }}
                </a>

                <a class="items-list {{ setActive('about') }}" href="{{ url('about') }}" >
                    {{ __('home.about_us') }}
                </a>

                <a class="items-list {{ setActive('blogs') }}" href="{{ url('blogs') }}" >
                    {{ __('home.blogs') }}
                </a>

                <a class="items-list {{ setActive('contact-us') }}" href="{{ url('contact-us') }}" >
                    {{ __('home.contact_us') }}
                </a>

                <a class="items-list" href="#lang-links" data-toggle="collapse"><span><i
                            class="fa fa-globe link-icon"></i></span>{{ __('home.language') }}<span><i
                            class="fa fa-chevron-down arrow"></i></span></a>
                <div class="collapse sub-menu" id="lang-links">
                    <a class="items-list" href="{{ url('lang/en') }}"> <i class="fa fa-flag"></i> {{ __('home.english') }}</a>
                    <a class="items-list" href="{{ url('lang/ar') }}"> <i class="fa fa-flag"></i> {{ __('home.arabic') }}</a>
                </div><!-- end sub-menu -->

            </div><!-- End list-group panel -->
        </div><!-- End main-menu -->
    </nav>
</div><!-- End sidenav-content -->
