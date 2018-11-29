@extends('layouts.master')

@php
    $qb = \App\Tour::with(['categories']);
    if ($catSlug = $params['slug']['value']) {

        if ($cat = \App\TourCategory::where('slug', $catSlug)->first())

        $qb = $qb->whereHas('categories', function($q) use ($catSlug){
            return $q->where('slug', $catSlug);
        });
    }
    $tours = $qb->paginate(6);

    $labels = cache()->rememberForever('labels', function() {
        return \App\Label::all();
    });
@endphp

@section('page')
    <div class="h1tags">
        <h1>{{ $labels->firstWhere('code','=','h1_tours')->label }}</h1>
    </div>
    @if(session()->has('success_message'))
    <div class="container">
        <div class="text-center" style="padding: 50px 0 0;">
            <h3>{{ session()->get('success_message') }}</h3>
            <a href="\" class="btn btn-primary">Вернуться на главную</a>
        </div>
    </div>
    @endif

    <div class="colorlib-wrap">
        <div class="container">
            @if(isset($cat) && $cat)
            <div class="row">
                <h3>{{ $cat->title }}</h3>
                {!! $cat->description !!}
            </div>
            @endif
            <div class="row">
                <div class="">
                    @foreach($tours->chunk(3) as $chunk)
                    <div class="row">
                        <div class="wrap-division">
                            @foreach($chunk as $tour)
                            <div class="col-md-4 col-sm-6 animate-box">
                                <div class="tour">
                                    <a href="{{ page_route('tour', ['slug' => $tour->slug]) }}" class="tour-img" style="background-image: url({{ $tour->image }});">
                                        <p class="price"><span>{{ $tour->price }}</span> <small>/ {{ $tour->days }}</small></p>
                                    </a>
                                    <span class="desc">
                                        <p class="star">
                                            <span>
                                                @for($i=0;$i<$tour->rating;$i++)
                                                    <i class="icon-star-full"></i>
                                                @endfor
                                            </span>
                                            @foreach($tour->categories as $category)
                                                <span><a href="{{ page_route('tours', ['slug'=>$category->slug]) }}" style="padding: 0 5px">#{{ $category->title }}</a></span>
                                            @endforeach
                                        </p>
                                        <h2><a href="{{ page_route('tour', ['slug' => $tour->slug]) }}">{{ $tour->title }}</a></h2>
                                        <span class="city">{{ $tour->place }}</span>
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $tours->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection