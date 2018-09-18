@extends('layouts.master')

@php
    $labels = \App\Label::all();
@endphp

@section('page')
<div id="colorlib-services">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-3 animate-box text-center aside-stretch">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-around"></i>
                    </span>
                    <h3>{{ $labels->firstWhere('code','=','achive_1_title')->label }}</h3>
                    <p>{{ $labels->firstWhere('code','=','achive_1_description')->label }}</p>
                </div>
            </div>
            <div class="col-md-3 animate-box text-center">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-boat"></i>
                    </span>
                    <h3>{{ $labels->firstWhere('code','=','achive_2_title')->label }}</h3>
                    <p>{{ $labels->firstWhere('code','=','achive_2_description')->label }}</p>
                </div>
            </div>
            <div class="col-md-3 animate-box text-center">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-car"></i>
                    </span>
                    <h3>{{ $labels->firstWhere('code','=','achive_3_title')->label }}</h3>
                    <p>{{ $labels->firstWhere('code','=','achive_3_description')->label }}</p>
                </div>
            </div>
            <div class="col-md-3 animate-box text-center">
                <div class="services">
                    <span class="icon">
                        <i class="flaticon-postcard"></i>
                    </span>
                    <h3>{{ $labels->firstWhere('code','=','achive_4_title')->label }}</h3>
                    <p>{{ $labels->firstWhere('code','=','achive_4_description')->label }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-tour colorlib-light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <h2>{{ $labels->firstWhere('code','=','tour_title')->label }}</h2>
                <p>{{ $labels->firstWhere('code','=','tour_description')->label }}</p>
            </div>
        </div>
    </div>
    <div class="tour-wrap">
        @foreach(\App\Tour::take(8)->get() as $tour )
        <a href="#" class="tour-entry animate-box">
            <div class="tour-img" style="background-image: url({{ $tour->image }});"></div>
            <span class="desc">
                <p class="star">
                    <span>
                        @for($i=0;$i<$tour->rating;$i++)
                            <i class="icon-star-full"></i>
                        @endfor
                    </span>
                </p>
                <h2>{{ $tour->title }}</h2>
                <span class="city">{{ $tour->place }}</span>
                <span class="price">{{ $tour->price }}</span>
            </span>
        </a>
        @endforeach
    </div>
</div>


<div id="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <h2>{{ $labels->firstWhere('code','=','blog_title')->label }}</h2>
                <p>{{ $labels->firstWhere('code','=','blog_description')->label }}</p>
            </div>
        </div>
        <div class="blog-flex">
            <div class="f-entry-img" style="background-image: url(images/blog-3.jpg);">
            </div>
            <div class="blog-entry aside-stretch-right">
                <div class="row">
                    @foreach(\App\Post::orderBy('created_at', 'desc')->with(['category'])->take(3)->get() as $post)
                    <div class="col-md-12 animate-box">
                        <a href="{{ $post->slug }}" class="blog-post">
                            <span class="img" style="background-image: url({{ $post->image }});"></span>
                            <div class="desc">
                                <span class="date">{{ $post->created_at }}</span>
                                <h3>{{ $post->title }}</h3>
                                <span class="cat">{{ $post->category->title }}</span>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div id="colorlib-intro" class="intro-img" style="background-image: url(images/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 animate-box">
                <div class="intro-desc">
                    <div class="text-salebox">
                        <div class="text-lefts">
                            <div class="sale-box">
                                <div class="sale-box-top">
                                    <h2 class="number">45</h2>
                                    <span class="sup-1">%</span>
                                    <span class="sup-2">Off</span>
                                </div>
                                <h2 class="text-sale">Sale</h2>
                            </div>
                        </div>
                        <div class="text-rights">
                            <h3 class="title">Just hurry up limited offer!</h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                            <p><a href="#" class="btn btn-primary">Book Now</a> <a href="#" class="btn btn-primary btn-outline">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 animate-box">
                <div class="video-wrap">
                    <div class="video colorlib-video" style="background-image: url(images/img_bg_2.jpg);">
                        <a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video"></i></a>
                        <div class="video-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="colorlib-hotel">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <h2>{{ $labels->firstWhere('code','=','excursion_title')->label }}</h2>
                <p>{{ $labels->firstWhere('code','=','excursion_description')->label }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 animate-box">
                <div class="owl-carousel">
                    @foreach(\App\Excursion::all() as $excursion)
                    <div class="item">
                        <div class="hotel-entry">
                            <a href="{{ $excursion->slug }}" class="hotel-img" style="background-image: url({{ $excursion->image }});">
                                <p class="price"><span>{{ $excursion->price }}</span></p>
                            </a>
                            <div class="desc">
                                <p class="star">
                                    <span>
                                        @for($i=0;$i<$excursion->rating;$i++)
                                            <i class="icon-star-full"></i>
                                        @endfor
                                    </span>
                                </p>
                                <h3><a href="{{ $excursion->slug }}">{{ $excursion->title }}</a></h3>
                                <span class="place">{{ $excursion->place }}</span>
                                <p>{{ $excursion->excerpt }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div id="colorlib-testimony" class="colorlib-light-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                <h2>{{ $labels->firstWhere('code','=','feedback_title')->label }}</h2>
                <p>{{ $labels->firstWhere('code','=','feedback_description')->label }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 animate-box">
                <div class="owl-carousel2">
                    @foreach(\App\Feedback::all() as $feedback)
                    <div class="item">
                        <div class="testimony text-center">
                            <span class="img-user" style="background-image: url({{ $feedback->image }});"></span>
                            <span class="user">{{ $feedback->name }}</span>
                            <small>{{ $feedback->place }}</small>
                            <blockquote>
                                <p>{{ $feedback->body }}</p>
                            </blockquote>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{--<div class="colorlib-tour">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">--}}
                {{--<h2>Most Popular Travel Countries</h2>--}}
                {{--<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="f-tour">--}}
                    {{--<div class="row row-pb-md">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-6 animate-box">--}}
                                    {{--<a  href="tours.html" class="f-tour-img" style="background-image: url(images/tour-1.jpg);">--}}
                                        {{--<div class="desc">--}}
                                            {{--<h3>Rome - 5 Days</h3>--}}
                                            {{--<p class="price"><span>$120</span> <small>/ person</small></p>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 animate-box">--}}
                                    {{--<a  href="tours.html" class="f-tour-img" style="background-image: url(images/tour-2.jpg);">--}}
                                        {{--<div class="desc">--}}
                                            {{--<h3>Rome - 5 Days</h3>--}}
                                            {{--<p class="price"><span>$120</span> <small>/ person</small></p>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 animate-box">--}}
                                    {{--<a  href="tours.html" class="f-tour-img" style="background-image: url(images/tour-3.jpg);">--}}
                                        {{--<div class="desc">--}}
                                            {{--<h3>Rome - 5 Days</h3>--}}
                                            {{--<p class="price"><span>$120</span> <small>/ person</small></p>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 animate-box">--}}
                                    {{--<a  href="tours.html" class="f-tour-img" style="background-image: url(images/tour-4.jpg);">--}}
                                        {{--<div class="desc">--}}
                                            {{--<h3>Rome - 5 Days</h3>--}}
                                            {{--<p class="price"><span>$120</span> <small>/ person</small></p>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 animate-box">--}}
                            {{--<div class="desc">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<h3>Italy, Europe</h3>--}}
                                        {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><br>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<h4>Best Tours City</h4>--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#">Rome</a></li>--}}
                                                    {{--<li><a href="#">Milan</a></li>--}}
                                                    {{--<li><a href="#">Genoa</a></li>--}}
                                                    {{--<li><a href="#">Verona</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#">Venice</a></li>--}}
                                                    {{--<li><a href="#">Bologna</a></li>--}}
                                                    {{--<li><a href="#">Trieste</a></li>--}}
                                                    {{--<li><a href="#">Florence</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#">Palermo</a></li>--}}
                                                    {{--<li><a href="#">Siena</a></li>--}}
                                                    {{--<li><a href="#">San Marino</a></li>--}}
                                                    {{--<li><a href="#">Naples</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<p><a href="tours.html" class="btn btn-primary">View All Places</a></p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="f-tour">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-md-push-6">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-6 animate-box">--}}
                                    {{--<a  href="tours.html" class="f-tour-img" style="background-image: url(images/tour-5.jpg);">--}}
                                        {{--<div class="desc">--}}
                                            {{--<h3>Rome - 5 Days</h3>--}}
                                            {{--<p class="price"><span>$120</span> <small>/ person</small></p>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 animate-box">--}}
                                    {{--<a  href="tours.html" class="f-tour-img" style="background-image: url(images/tour-6.jpg);">--}}
                                        {{--<div class="desc">--}}
                                            {{--<h3>Rome - 5 Days</h3>--}}
                                            {{--<p class="price"><span>$120</span> <small>/ person</small></p>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 animate-box">--}}
                                    {{--<a  href="tours.html" class="f-tour-img" style="background-image: url(images/tour-7.jpg);">--}}
                                        {{--<div class="desc">--}}
                                            {{--<h3>Rome - 5 Days</h3>--}}
                                            {{--<p class="price"><span>$120</span> <small>/ person</small></p>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6 animate-box">--}}
                                    {{--<a  href="tours.html" class="f-tour-img" style="background-image: url(images/tour-8.jpg);">--}}
                                        {{--<div class="desc">--}}
                                            {{--<h3>Rome - 5 Days</h3>--}}
                                            {{--<p class="price"><span>$120</span> <small>/ person</small></p>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 animate-box col-md-pull-6 text-right">--}}
                            {{--<div class="desc">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<h3>Athens, Greece</h3>--}}
                                        {{--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p><br>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<h4>Best Tours City</h4>--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#">Rome</a></li>--}}
                                                    {{--<li><a href="#">Milan</a></li>--}}
                                                    {{--<li><a href="#">Genoa</a></li>--}}
                                                    {{--<li><a href="#">Verona</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#">Venice</a></li>--}}
                                                    {{--<li><a href="#">Bologna</a></li>--}}
                                                    {{--<li><a href="#">Trieste</a></li>--}}
                                                    {{--<li><a href="#">Florence</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4 col-sm-4 col-xs-4">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="#">Palermo</a></li>--}}
                                                    {{--<li><a href="#">Siena</a></li>--}}
                                                    {{--<li><a href="#">San Marino</a></li>--}}
                                                    {{--<li><a href="#">Naples</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<p><a href="tours.html" class="btn btn-primary">View All Places</a></p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

@endsection