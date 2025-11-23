<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\MainCart;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function index()
    {
        $stockItems = Cart::getContent();
        foreach ($stockItems as $item) {
            $itemStock = $item->options->stock ?? null;

            if ($itemStock !== null && $itemStock < $item->quantity) {
                $stock_error = $stockItems->count();
            }
        }

        if(empty($stock_error)){
            $stock_error = 0;
        }

        return view('customer.cart',compact('stock_error'));
    }
    public function add()
    {
        $product = Product::with('detail')->find(\request('id'));
        $cartItem=Cart::add($product->id, $product->product_name, $product->price,1,  0,['slug' =>$product->slug,'product_image' =>$product->detail->product_image,'stock'=>$product->stock],);


        if(auth()->check())
        {
            $active_cart_id = session('active_cart_id');
            if (!isset($active_cart_id))
            {
                $active_cart=Maincart::create([
                    'user_id' => auth()->id()
                ]);
                $active_cart_id=$active_cart->id;
                session()->put('active_cart_id',$active_cart_id);
            }
            CartProduct::updateOrCreate(
                ['main_cart_id' => $active_cart_id,'product_id' => $product->id],
                ['number' => $cartItem->qty, 'price'=>$product->price,'situation'=>'beklemede']
            );
        }

        return redirect()->route('customer.cart')
            ->with('message_type','success')
            ->with('message','Ürün sepete eklendi');

    }
    public function delete($rowid)
    {
        if(auth()->check())
        {
            $active_cart_id = session('active_cart_id');
            $cartItem = Cart::get($rowid);
            CartProduct::where('main_cart_id',$active_cart_id)->where('product_id',$cartItem->id)->delete();
        }
        Cart::remove($rowid);
        return redirect()->route('customer.cart')
        ->with('message_type','success')
        ->with('message','Ürün sepetten kaldırıldı.');
    }
    public function unload()
    {
        if(auth()->check())
        {
            $active_cart_id = session('active_cart_id');
            CartProduct::where('main_cart_id',$active_cart_id)->delete();
        }
        Cart::destroy();
        return redirect()->route('customer.cart')
            ->with('message_type','success')
            ->with('message','Sepetten boşaltıldı.');
    }
    public function update($rowid)
    {
        $number = request('number');
        if(auth()->check())
        {
            $active_cart_id = session('active_cart_id');
            $cartItem = Cart::get($rowid);

            if($number == 0) {
                CartProduct::where('main_cart_id', $active_cart_id)
                    ->where('product_id', $cartItem->id)
                    ->delete();
            } else {
                CartProduct::where('main_cart_id', $active_cart_id)
                    ->where('product_id', $cartItem->id)
                    ->update(['number' => $number]);
            }
        }

        // Sepetteki ürünü güncelle
        Cart::update($rowid, [
            'quantity' => [
                'relative' => false,
                'value' => $number
            ]
        ]);

        // Güncel subtotal ve toplam fiyatı al
        $cartItemUpdated = Cart::get($rowid);
        $subtotal = $cartItemUpdated ? $cartItemUpdated->price * $cartItemUpdated->quantity : 0;
        $total = Cart::getContent()->sum(function ($item) {
            return $item->price * $item->quantity;
        });
        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'total' => $total,
            'number' => $number,
            'rowid' => $rowid
        ]);
    }




}
