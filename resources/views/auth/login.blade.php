@extends('auth.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">用户登录</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <form action="{{ action('Auth\\LoginController@store') }}" method="POST">
                    {{ csrf_field() }}
                    @include('auth.layouts.errors')
                    <div class="form-group">
                        <label for="username">用户名（手机号）</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-md-offset-4">
                                    <input type="submit" class="btn btn-default form-control" value="登录">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
