<?php

namespace App\Http\Controllers;

use App\Models\Order;

use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('MainCart')
            ->whereHas('MainCart', function($query) {
                $query->where('user_id', auth()->id());
            })
            ->orderByDesc('created_at')->get();
        return view('orders',compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::with('MainCart.cartproducts.product')
            ->whereHas('MainCart', function($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('order.id', $id)
            ->firstOrFail();

        return view('order', compact('order'));
    }
}

