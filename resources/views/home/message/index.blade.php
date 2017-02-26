@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>消息</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>标题</th>
                            <th>内容</th>
                            <th>时间</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $message->title }}</td>
                                <td>{{ $message->body }}</td>
                                <td>{{ $message->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
@stop
