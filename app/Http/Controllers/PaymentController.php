<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('user.login')
                ->with('message_type', 'info')
                ->with('message', 'Ödeme işlemi için oturum açmanız veya kullanıcı kaydı yapmanız gerekmektedir.');
        } else if (count(Cart::content()) == 0) {
            return redirect()->route('index')
                ->with('message_type', 'info')
                ->with('message', 'Ödeme işlemi için sepetinizde bir ürün bulunmalıdır.');
        }
        $userdetail = auth()->user()->detail;
        return view('payment', compact('userdetail'));
    }

    public function pay()
    {
        $order = \request()->all();
        $order['main_cart_id'] = session('active_cart_id');
        $order['bank'] = "Garanti";
        $order['number_installments'] = 1;
        $order['situation'] = "Siparişiniz alındı.";
        $order['order_price'] = Cart::subtotal();

        Order::create($order);
        Cart::destroy();
        session()->forget('active_cart_id');

        return redirect()->route('orders')
            ->with('message_type', 'success')
            ->with('message', 'Ödemeniz başarılı bir şekilde gerçekleşti.');
    }
}
