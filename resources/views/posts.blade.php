@extends('layouts.master')

@php

    $categorySlug = $params['slug']['value'];
    $posts = \App\Post::query();

    if ($categorySlug) {
        $posts = $posts->whereHas('category', function($q) use ($categorySlug){
            return $q->where('slug', $categorySlug);
        });
    }

    $posts = $posts->paginate(10);

    $categories = \App\PostCategory::all();
    $lastPosts = \App\Post::orderBy('id', 'desc')->take(3)->get();
    $labels = \App\Label::all();
@endphp

@section('page')
    <div id="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="wrap-division">
                        @foreach($posts as $post)
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
                                    <p>{{ $post->excerpt }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $posts->links() }}
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
                        <div class="side animate-box">
                            <div class="sidebar-heading">{{ $labels->firstWhere('code','=','categories')->label }}</div>
                            <ul class="category">
                                @foreach($categories as $category)
                                <li><a href="{{ page_route('posts', ['slug'=>$category->slug]) }}"><i class="icon-check"></i> {{ $category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection