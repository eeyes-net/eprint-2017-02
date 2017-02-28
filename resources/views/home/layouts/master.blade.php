<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <style>
        body {
            padding-top: 50px;
        }
        @media (min-width: 768px) {
            .sidebar {
                position: fixed;
                top: 50px;
                bottom: 0;
                left: 0;
                z-index: 1000;
                overflow-x: hidden;
                overflow-y: auto;
            }
        }

        .sidebar {
            padding-top: 1px;
            padding-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #999;
        }
    </style>
</head>
<body>
    @include('layouts.header')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-2 sidebar">
                    @include('home.layouts.sidebar')
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
