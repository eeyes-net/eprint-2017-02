@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>用户验证</h3>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <form action="{{ action('Home\CodeController@verify') }}" method="POST">
                {{ csrf_field() }}
                @include('auth.layouts.errors')
                <div class="form-group">
                    <label for="code">邀请码</label>
                    <input type="text" class="form-control" name="code" id="code" required>
                </div>
                <div class="form-group">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-md-offset-4">
                                <input type="submit" class="btn btn-default form-control" value="提交">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
