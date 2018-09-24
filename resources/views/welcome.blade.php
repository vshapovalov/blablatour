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
                    <p style="color: black;">{{ $labels->firstWhere('code','=','achive_1_description')->label }}</p>
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
        @foreach(\App\Tour::where('is_popular', '<>', 0)->take(8)->get() as $tour )
            <a href="{{ page_route('tour', [ 'slug' => $tour->slug ]) }}" class="tour-entry animate-box">
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
                        <div class="text-rights">
                            <h3 class="title">{{ $labels->firstWhere('code','=','video_title')->label }}</h3>
                            <p>{{ $labels->firstWhere('code','=','video_text')->label }}</p>
                            @if ($labels->firstWhere('code','=','video_button_url'))
                                <p>
                                    <a href="{{ $labels->firstWhere('code','=','video_button_url')->label }}"
                                      class="btn btn-primary btn-outline">{{ $labels->firstWhere('code','=','video_button_caption')->label }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 animate-box">
                <div class="video-wrap">
                    <div class="video colorlib-video" style="background-image: url({{ count( crud_image(crud_settings('site.video_bg'), true)) ? crud_image(crud_settings('site.video_bg'), true)[0] : 'images/img_bg_2.jpg' }}); position: relative">
                        <a href="{{ crud_settings('site.video_url') }}" class="popup-vimeo"><i class="icon-video"></i></a>
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
                                <a href="{{ page_route('excursion', ['slug' => $excursion->slug]) }}" class="hotel-img" style="background-image: url({{ $excursion->image }});">
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
                                    <h3><a href="{{ page_route('excursion', ['slug' => $excursion->slug])  }}">{{ $excursion->title }}</a></h3>
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

<div id="colorlib-testimony" class="colorlib-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center animate-box">
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

@endsection