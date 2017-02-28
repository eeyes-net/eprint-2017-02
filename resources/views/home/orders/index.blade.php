@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>我的订单</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>下单时间</th>
                            <th>打印店</th>
                            <th>状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->shop->name }}</td>
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
                                        <div class="alert alert-info">
                                            文件正在打印中
                                        </div>
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
