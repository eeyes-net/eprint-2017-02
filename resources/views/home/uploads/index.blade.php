@extends('home.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h3>我的文件</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-default" href="{{ action('Home\UploadController@create') }}">上传新文件</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>文件名</th>
                            <th>文件大小</th>
                            <th>文件页数</th>
                            <th>上传时间</th>
                            <th>打印</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($uploads as $upload)
                            <tr>
                                <td>{{ $upload->name }}</td>
                                <td>{{ human_file_size($upload->size) }}</td>
                                <td>{{ $upload->getMeta('pages', '未知') }}</td>
                                <td>{{ $upload->created_at }}</td>
                                <td>
                                    <form action="{{ action('Home\OrderController@create') }}" method="GET">
                                        <input type="hidden" name="upload_id" value="{{ $upload->id }}">
                                        <input type="submit" class="btn btn-default" value="打印这份文档">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                {{ $uploads->links() }}
            </div>
        </div>
    </div>
@stop
