@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">生成邀请码</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="{{ action('Home\Admin\CodeController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <input class="btn btn-default" type="submit" value="生成邀请码">
                </form>
            </div>
            @if(isset($code))
                <div class="col-sm-12">
                    10分钟之内单次有效：{{ $code }}
                </div>
            @endif
        </div>
    </div>
@stop
