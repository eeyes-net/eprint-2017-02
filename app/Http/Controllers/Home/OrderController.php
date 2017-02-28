<?php

namespace App\Http\Controllers\Home;

use App\Order;
use App\User;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->paginate();
        return view('home.orders.index', compact('orders'));
    }

    public function create()
    {
        if (!request()->has('upload_id') ||
            !$upload = auth()->user()->uploads()->find(request('upload_id'))
        ) {
            return redirect(action('Home\UploadController@index'));
        }
        $shops = User::shops();
        return view('home.orders.create', compact('shops', 'upload'));
    }

    public function store()
    {
        if (!request()->has('upload_id') ||
            !$upload = auth()->user()->uploads()->find(request('upload_id'))
        ) {
            return redirect(action('Home\UploadController@index'));
        }
        $shop_id = request('shop_id');
        if (!User::find($shop_id)->isShop()) {
            return back();
        };
        $order = new Order([
            'shop_id' => $shop_id,
            'status' => 'ordered',
        ]);
        auth()->user()->orders()->save($order);
        $order->uploads()->sync([$upload->id]);
        return redirect(action('Home\OrderController@index'));
    }
}
