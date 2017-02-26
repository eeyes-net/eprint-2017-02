@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>个人信息</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>账号</td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td>密码</td>
                            <td><a href="{{ action('Home\\PasswordController@edit') }}">点击此处修改密码</a></td>
                        </tr>
                        <tr>
                            <td>昵称</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>联系方式</td>
                            <td>{{ $user->getMeta('contact', '未设置') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <a class="form-control btn btn-default" href="{{ action('Home\\InfoController@edit') }}">修改个人信息</a>
            </div>
        </div>
    </div>
@stop
