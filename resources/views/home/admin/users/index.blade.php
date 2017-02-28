@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>所有用户</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>账号</th>
                            <th>昵称</th>
                            <th>类型</th>
                            <th>创建时间</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <form action="{{ action('Home\Admin\UserController@update', ['id' => $user->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <select class="form-control" name="type" onchange="this.parentElement.submit()">
                                            @foreach([
                                                ['name' => '超级管理员', 'value' => 'root'],
                                                ['name' => '管理员', 'value' => 'admin'],
                                                ['name' => '打印店', 'value' => 'shop'],
                                                ['name' => '普通用户', 'value' => 'user'],
                                                ['name' => '匿名用户', 'value' => 'anonymous'],
                                            ] as $user_type)
                                                <option value="{{ $user_type['value'] }}" @if($user->type === $user_type['value']) selected @endif >{{ $user_type['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@stop
