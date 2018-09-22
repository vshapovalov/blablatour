@extends('layouts.master')

@php
    $tours = \App\Tour::paginate(6);
@endphp

@section('page')
    <div class="colorlib-wrap">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="row">
                        <div class="wrap-division">
                            @foreach($tours as $tour)
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
                                            </p>
                                            <h2>
                                                <a href="{{ page_route('tour', ['slug' => $tour->slug]) }}">{{ $tour->title }}</a>
                                            </h2>
											<span class="city">{{ $tour->place }}</span>
										</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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