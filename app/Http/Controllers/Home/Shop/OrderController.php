<?php

namespace App\Http\Controllers\Home\Shop;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->shopOrders()->latest()->paginate();
        return view('home.shop.orders.index', compact('orders'));
    }

    public function download($id)
    {
        $order = auth()->user()->shopOrders()->find($id);
        if (!$order || !$order->canDownload()) {
            return redirect(route('home'));
        }
        $order->status = 'downloaded';
        $order->save();
        return redirect(config('filesystems.disks.uploads.url') . '/' . $order->uploads()->first()->rel_path);
    }
}
