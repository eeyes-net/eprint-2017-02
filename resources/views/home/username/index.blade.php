@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>账号修改</h3>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <form action="{{ action('Auth\RegisterController@store') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                @include('auth.layouts.errors')
                <div class="form-group">
                    <label for="username_old">原手机号</label>
                    <input type="text" class="form-control" name="username_old" id="username_old" disabled value="{{ $user->username }}">
                </div>
                <div class="form-group">
                    <label for="code">短信验证码 <a href="javascript:document.getElementById('send').submit()">点击此处获取</a></label>
                    <input type="text" class="form-control" name="code" id="code" required>
                </div>
                <div class="form-group">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-md-offset-4">
                                <input type="submit" class="btn btn-default form-control" value="下一步">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="hidden">
        <form id="send" action="{{ action('Home\UsernameController@sendToOld') }}" method="POST">
            {{ csrf_field() }}
        </form>
    </div>
@stop
