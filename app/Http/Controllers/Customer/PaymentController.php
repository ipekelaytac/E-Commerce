<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('customer.user.login')
                ->with('message_type', 'info')
                ->with('message', 'Ödeme işlemi için oturum açmanız veya kullanıcı kaydı yapmanız gerekmektedir.');
        } else if (count(Cart::content()) == 0) {
            return redirect()->route('customer.index')
                ->with('message_type', 'info')
                ->with('message', 'Ödeme işlemi için sepetinizde bir ürün bulunmalıdır.');
        }
        $userdetail = auth()->user()->detail;
        return view('customer.payment', compact('userdetail'));
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
        $cartItems = DB::table('cart_product')
            ->where('main_cart_id', session('active_cart_id'))
            ->get();
        foreach ($cartItems as $cartItem) {
            DB::table('products')
                ->where('id',$cartItem->product_id)
                ->decrement(
                'stock',
                $cartItem->number
        );}

        Cart::destroy();
        session()->forget('active_cart_id');

        return redirect()->route('customer.orders')
            ->with('message_type', 'success')
            ->with('message', 'Ödemeniz başarılı bir şekilde gerçekleşti.');
    }
}
