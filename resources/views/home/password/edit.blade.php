@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>密码修改</h3>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <form action="{{ action('Auth\\RegisterController@store') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                @include('auth.layouts.errors')
                <div class="form-group">
                    <label for="password_old">原密码</label>
                    <input type="text" class="form-control" name="password_old" id="password_old" required>
                </div>
                <div class="form-group">
                    <label for="password">新密码</label>
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
                                <input type="submit" class="btn btn-default form-control" value="设置新密码">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
