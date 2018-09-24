@php
    $labels = \App\Label::all();
@endphp
<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $labels->firstWhere('code','=','site_title')->label }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $labels->firstWhere('code','=','site_description')->label }}" />
    <meta name="keywords" content="{{ $labels->firstWhere('code','=','site_keywords')->label }}" />
    <meta name="B-verify" content="0c34dd0302136b214c7124544c6193e090686f4e" />

    @yield('socialtags')

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="/css/flexslider.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="/css/style.css?123155555232">

    <!-- Modernizr JS -->
    <script src="/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>
<body>

<div class="colorlib-loader"></div>

<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo">
                            <a href="/" title="Bla Bla Tour">
                                <img src="/images/logo.png" alt="" style="width: 100px">
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            @foreach(\Vshapovalov\Crud\Models\MenuItem::orderBy('order')->get() as $menu)
                            <li class="is-active"><a href="{{ $menu->url }}">{{ $menu->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
                @foreach(\App\Slide::all() as $slide)
                <li style="background-image: url({{ $slide->image }});">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>{{ $slide->subheading }}</h2>
                                    <h1>{{ $slide->headline }}</h1>
                                    @if($slide->url)
                                        <a href="{{ $slide->url }}" class="btn btn-primary">{{ $slide->button_caption ? $slide->button_caption : 'Перейти' }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <div class="container"></div>
    @yield('page')

    <div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>{{ $labels->firstWhere('code','=','subscribe_title')->label }}</h2>
                    <p>{{ $labels->firstWhere('code','=','subscribe_description')->label }}</p>
                    <form method="POST" action="{{ page_route('send_form') }}" class="form-inline qbstp-header-subscribe">
                        {{ csrf_field() }}
                        <input type="text" hidden name="form_name" value="subscribe">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                                <div class="form-group">
                                    <input
                                            type="email" name="email"
                                            class="form-control" id="email"
                                            placeholder="{{ $labels->firstWhere('code','=','subscribe_placeholder')->label }}"
                                            required
                                    >
                                    <button type="submit" class="btn btn-primary">{{ $labels->firstWhere('code','=','subscribe_button')->label }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer id="colorlib-footer" role="contentinfo">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-3 colorlib-widget">
                    <h4>{{ $labels->firstWhere('code','=','brand_title')->label }}</h4>
                    <p>{{ $labels->firstWhere('code','=','brand_description')->label }}</p>
                    <p>
                    <ul class="colorlib-social-icons">
                        <li><a href="{{ $labels->firstWhere('code','=','url_facebook')->label }}" target="_blank"><i class="icon-facebook"></i></a></li>
                        <li><a href="{{ $labels->firstWhere('code','=','url_vk')->label }}" target="_blank"><i class="icon-vk"></i></a></li>
                        <li><a href="{{ $labels->firstWhere('code','=','url_insta')->label }}" target="_blank"><i class="icon-instagram"></i></a></li>
                        {{--<li><a href="{{ $labels->firstWhere('code','=','contact_email')->label }}"><i class="icon-linkedin"></i></a></li>--}}
                        {{--<li><a href="{{ $labels->firstWhere('code','=','url_dribble')->label }}"><i class="icon-dribbble"></i></a></li>--}}
                    </ul>
                    </p>
                </div>
                <div class="col-md-2 colorlib-widget">
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>Туры</h4>
                    <p>
                    <ul class="colorlib-footer-links">
                        @foreach(\App\Tour::take(4)->get() as $tour)
                        <li><a href="{{ page_route('tour', ['slug' => $tour->slug])}}">{{ $tour->title }}</a></li>
                        @endforeach
                    </ul>
                    </p>
                </div>
                <div class="col-md-2">
                    <h4>Блог</h4>
                    <ul class="colorlib-footer-links">
                        @foreach(\App\Post::take(3)->get() as $post)
                        <li><a href="{{ page_route('post', ['slug' => $post->slug])}}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-3 col-md-push-1">
                    <h4>Контакты</h4>
                    <ul class="colorlib-footer-links">
                        <li>{{ $labels->firstWhere('code','=','contact_address')->label }}</li>
                        <li><a href="tel://{{ $labels->firstWhere('code','=','contact_phone')->label }}">{{ $labels->firstWhere('code','=','contact_phone_display')->label }}</a></li>
                        <li><a href="mailto:{{ $labels->firstWhere('code','=','contact_email')->label }}">{{ $labels->firstWhere('code','=','contact_email')->label }}</a></li>
                        <li><a href="/">{{ $labels->firstWhere('code','=','site_title')->label }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | With <i class="icon-heart2" aria-hidden="true"></i> Bla Bla Tour
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="/js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="/js/bootstrap-datepicker.js"></script>
<!-- Stellar Parallax -->
<script src="/js/jquery.stellar.min.js"></script>
@yield('page_scripts')
<!-- Main -->
<script src="/js/main.js"></script>

</body>
</html>