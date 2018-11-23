@extends('layouts.master')

@php
    $qb = \App\Excursion::with(['categories']);
    if ($catSlug = $params['slug']['value']) {

        if ($cat = \App\ExcursionCategory::where('slug', $catSlug)->first())

        $qb = $qb->whereHas('categories', function($q) use ($catSlug){
            return $q->where('slug', $catSlug);
        });
    }
    $tours = $qb->simplePaginate();
@endphp

@section('page')
    @if(session()->has('success_message'))
        <div class="container">
            <div class="text-center" style="padding: 50px 0 0;">
                <h3>{{ session()->get('success_message') }}</h3>
                <a href="\" class="btn btn-primary">Вернуться на главную</a>
            </div>
        </div>
    @endif


    <div class="colorlib-wrap">
        @if(isset($cat) && $cat)
        <div class="container">
            <div class="row">
                <h3>{{ $cat->title }}</h3>
                {!! $cat->description !!}
            </div>
        </div>
        @endif
        <div class="container">
            @foreach ($tours->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $tour)
                    <div class="col-xs-12 col-md-4 animate-box">
                        <div class="tour">
                            <a href="{{ page_route('excursion', ['slug' => $tour->slug]) }}" class="tour-img" style="background-image: url({{ $tour->image }});">
                                <p class="price"><span>{{ $tour->price }}</span></p>
                            </a>
                            <span class="desc">
                                <p class="star">
                                    <span>
                                        @for($i=0;$i<$tour->rating;$i++)
                                            <i class="icon-star-full"></i>
                                        @endfor
                                    </span>
                                    @foreach($tour->categories as $category)
                                        <span><a href="{{ page_route('excursions', ['slug'=>$category->slug]) }}" style="padding: 0 5px">#{{ $category->title }}</a></span>
                                    @endforeach
                                </p>
                                @if($tour == $tours->first())
                                    <h1 class="h1toh2 h1toh2_excursion"><a href="{{ page_route('excursion', ['slug' => $tour->slug]) }}">{{ $tour->title }}</a></h2>
                                @else
                                    <h2><a href="{{ page_route('excursion', ['slug' => $tour->slug]) }}">{{ $tour->title }}</a></h2>
                                @endif
                                <span class="city">{{ $tour->place }}</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>

@endsection