@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-top: 50px;">
            <div class="col-sm-12 col-lg-4 col-lg-offset-4">
                <img style="width: 100%;" src="{{ asset('images/intro_eprint.png') }}" alt="e快印">
            </div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <div class="col-sm-12 col-lg-2 col-lg-offset-5">
                <a href="{{ action('Auth\LoginController@create') }}" class="btn btn-default form-control">立即使用</a>
            </div>
        </div>
    </div>
@stop
