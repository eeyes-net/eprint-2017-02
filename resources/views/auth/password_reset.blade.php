@extends('auth.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">用户注册</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                <form action="{{ action('Auth\\RegisterController@store') }}" method="POST">
                    {{ csrf_field() }}
                    @include('auth.layouts.errors')
                    <div class="form-group">
                        <label for="username">账号（手机号）</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="token">短信验证码 <a href="#">点击此处获取</a></label>
                        <input type="text" class="form-control" name="token" id="token">
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">重复密码</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-md-offset-4">
                                    <input type="submit" class="btn btn-default form-control" value="重置">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
