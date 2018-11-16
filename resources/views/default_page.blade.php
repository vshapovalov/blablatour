@extends('layouts.master')

@section('page')
    <div id="colorlib-blog" class="default-view">
        <div class="container">
            {!!  $page->body !!}
        </div>
    </div>

@endsection