@extends('layouts.master')

@php

    if ($params['slug']['value'] && $post = \App\Excursion::where('slug', $params['slug']['value'])->first()) {
    } else {
        redirect_now('/404');
    }

    $lastPosts = \App\Post::orderBy('id', 'desc')->take(6)->get();
    $labels = \App\Label::all();
@endphp

@section('page')
    <div id="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="wrap-division">
                        <article class="animate-box">
                            <div class="blog-img" style="background-image: url({{ $post->image }});"></div>
                            <div class="desc">
                                <div class="meta">
                                    <p>
                                        <span>{{ $post->created_at }} </span>
                                        {{--<span>admin </span>--}}
                                        {{--<span><a href="#">2 Comments</a></span>--}}
                                    </p>
                                </div>
                                <h2><a href="{{ page_route('post', ['slug'=>$post->slug]) }}">{{ $post->title }}</a></h2>
                                <div class="">{!!  $post->body !!}</div>
                            </div>
                        </article>

                        <div class="animate-box">
                            <h3>{{ 'Отправить заявку' }}</h3>
                            <form method="POST" action="{{ page_route('send_form') }}">
                                {{ csrf_field() }}
                                <input type="text" hidden name="form_name" value="get_excursion">
                                <input type="text" hidden name="target" value="{{ $post->title }}">
                                <div class="row form-group">
                                    <div class="col-md-6 padding-bottom">
                                        <label for="fname">{{ $labels->firstWhere('code','=','first_name')->label }}</label>
                                        <input type="text" name="first_name" id="fname" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="persons">{{ $labels->firstWhere('code','=','persons_qty')->label }}</label>
                                        <input type="number" name="persons" id="persons" class="form-control" placeholder="" value="1" required>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="email">{{ $labels->firstWhere('code','=','email')->label }}</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone">{{ $labels->firstWhere('code','=','phone')->label }}</label>
                                        <input type="tel" id="email" name="phone" class="form-control" placeholder="" >
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="date">{{ $labels->firstWhere('code','=','excursion_date')->label }}</label>
                                        <div class="form-field">
                                            <i class="icon icon-calendar2"></i>
                                            <input type="text" id="date" name="target_date" class="form-control date" placeholder="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group text-center">
                                    <input type="submit" value="{{ $labels->firstWhere('code','=','send')->label }}" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sidebar-wrap">
                        <div class="side animate-box">
                            <h3 class="sidebar-heading">{{ $labels->firstWhere('code','=','recent_posts')->label }}</h3>
                            @foreach($lastPosts as $lastPost)
                                <div class="blog-entry-side">
                                    <a href="{{ page_route('post', ['slug'=>$lastPost->slug]) }}" class="blog-post">
                                        <span class="img" style="background-image: url({{ $lastPost->image }});"></span>
                                        <div class="desc">
                                            <span class="date">{{ $lastPost->created_at }}</span>
                                            <h3>{{ $lastPost->title }}</h3>
                                            <span class="cat">{{ $lastPost->category->title }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection