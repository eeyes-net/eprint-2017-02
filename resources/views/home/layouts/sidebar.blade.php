<h4>菜单</h4>
<ul class="nav nav-sidebar" id="sidebar">
    <li><a href="{{ action('Home\InfoController@index') }}">个人信息</a></li>
    <li><a href="{{ action('Home\MessageController@index') }}">消息</a></li>
    <li><a href="{{ action('Home\OrderController@index') }}">我的订单</a></li>
    <li><a href="{{ action('Home\UploadController@index') }}">我的文件</a></li>
    @if(auth()->user()->isShop())
        <li><a href="{{ action('Home\Shop\OrderController@index') }}">我收到的订单</a></li>
    @elseif(auth()->user()->isAdmin() || auth()->user()->isRoot())
        <li><a href="{{ action('Home\Admin\UserController@index') }}">用户列表</a></li>
        <li><a href="{{ action('Home\Admin\CodeController@create') }}">生成邀请码</a></li>
    @endif
</ul>
