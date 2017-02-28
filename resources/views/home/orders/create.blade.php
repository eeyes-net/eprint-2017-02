@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>创建新订单</h3>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <form action="{{ action('Home\OrderController@store') }}" method="POST">
                {{ csrf_field() }}
                @include('auth.layouts.errors')
                <div class="form-group">
                    <label>文件</label>
                    <input type="hidden" name="upload_id" id="upload_id" value="{{ $upload->id }}">
                    <input type="text" class="form-control" value="{{ $upload->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="shop_id">打印店</label>
                    <select class="form-control" name="shop_id" id="shop_id">
                        @foreach($shops as $shop)
                            <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-md-offset-4">
                                <input type="submit" class="btn btn-default form-control" value="提交订单">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
