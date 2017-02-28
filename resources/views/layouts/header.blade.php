<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (auth()->check())
                    <form action="{{ action('Auth\LoginController@destroy') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" id="logout" style="display: none;">
                    </form>
                    <li><a href="{{ action('Home\IndexController@index') }}">您好：{{ auth()->user()->name }}</a></li>
                    <li><a href="javascript:document.getElementById('logout').click()">退出登录</a></li>
                @else
                    <li><a href="{{ route('login') }}">登录</a></li>
                    <li><a href="{{ action('Auth\RegisterController@create') }}">注册</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
