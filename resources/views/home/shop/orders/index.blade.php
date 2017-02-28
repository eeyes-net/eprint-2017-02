@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>我收到的订单</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>下单时间</th>
                            <th>用户</th>
                            <th>下载</th>
                            <th>状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>
                                    @if ($order->canDownload())
                                        <a class="btn btn-default" target="_blank" href="{{ action('Home\Shop\OrderController@download', ['id' => $order->id]) }}">下载文件</a>
                                    @else
                                        文件已失效
                                    @endif
                                </td>
                                <td>
                                    @if ($order->status === 'ordered')
                                        <div class="alert alert-warning">
                                            文件还未下载
                                        </div>
                                    @elseif  ($order->status === 'finished')
                                        <div class="alert alert-success">
                                            订单已完成
                                        </div>
                                    @else
                                        <form action="{{ action('Home\Shop\OrderController@finish', ['id' => $order->id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input class="btn btn-default" type="submit" value="提醒用户打印已完成">
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@stop
