@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>上传新文件</h3>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <form action="{{ action('Home\UploadController@store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('auth.layouts.errors')
                <div class="form-group">
                    <label for="file">文件</label>
                    <input type="file" class="form-control" name="file" id="file">
                </div>
                <div class="form-group">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-md-offset-4">
                                <input type="submit" class="btn btn-default form-control" value="上传">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
