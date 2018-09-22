@extends('layouts.master')

@section('page')
    <div class="container">
        <div class="text-center" style="padding: 50px 0">
            <h3>{{ session()->get('success_message') }}</h3>
            <a href="\" class="btn btn-primary">Вернуться на главную</a>
        </div>
    </div>
@endsection