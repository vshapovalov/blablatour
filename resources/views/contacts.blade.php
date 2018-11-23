@extends('layouts.master')

@php
    $labels = cache()->rememberForever('labels', function() {
        return \App\Label::all();
    });
@endphp

@section('page')
    <div id="colorlib-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <h3>{{ $labels->firstWhere('code','=','contacts_title')->label }}</h3>
                    <form method="POST" action="{{ page_route('send_form') }}">
                        {{ csrf_field() }}
                        <input type="text" hidden name="form_name" value="send_message">
                        <div class="row form-group">
                            <div class="col-md-6 padding-bottom">
                                <label for="fname">{{ $labels->firstWhere('code','=','first_name')->label }}</label>
                                <input type="text" name="first_name" id="fname" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lname">{{ $labels->firstWhere('code','=','last_name')->label }}</label>
                                <input type="text" name="last_name" id="lname" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">{{ $labels->firstWhere('code','=','email')->label }}</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="phone">{{ $labels->firstWhere('code','=','phone')->label }}</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="" >
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="subject">{{ $labels->firstWhere('code','=','subject')->label }}</label>
                                <input type="text" id="subject" name="subject" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="message">{{ $labels->firstWhere('code','=','message')->label }}</label>
                                <textarea name="message" required id="message" cols="30" rows="10" class="form-control" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="row form-group text-center">
                            <input type="submit" value="{{ $labels->firstWhere('code','=','send_message')->label }}" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <h1 class="h1toh2 h1toh2__contacts">{{ $labels->firstWhere('code','=','contacts_info')->label }}</h1>
                    <div class="row contact-info-wrap">
                        <div class="col-md-3">
                            <p><span><i class="icon-location"></i></span> {{ $labels->firstWhere('code','=','contact_address')->label }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-phone3"></i></span> <a href="tel://{{ $labels->firstWhere('code','=','contact_phone')->label }}">{{ $labels->firstWhere('code','=','contact_phone_display')->label }}</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-paperplane"></i></span> <a href="mailto:{{ $labels->firstWhere('code','=','contact_email')->label }}">{{ $labels->firstWhere('code','=','contact_email')->label }}</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-globe"></i></span> <a href="/">{{ $labels->firstWhere('code','=','site_title')->label }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
    <script src="js/google_map.js"></script>
@endsection