@extends('layouts.master')

@section('meta_title', $page->meta_title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)


@section('page')
    <div id="colorlib-blog" class="default-view">
        <div class="container">
            {!!  $page->body !!}
        </div>
    </div>

@endsection