<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartProduct;
use App\Models\MainCart;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $stock = Cart::content();
        foreach ($stock as $stock_errors){
            if($stock_errors->options->stock < $stock_errors->qty){
                $stock_error = Cart::content()->count();
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
        $cartItem=Cart::add($product->id, $product->product_name, 1 , $product->price, 0,['slug' =>$product->slug,'product_image' =>$product->detail->product_image,'stock'=>$product->stock],);


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
//        $validator = Validator::make(\request()->all(),[
//           'number' =>'required|numeric|between:0,5'
//        ]);
//       if ($validator->fails()){
//           session()->flash('message_type','danger');
//           session()->flash('message','adet değeri en az 1 en fazla 5 olabilir .');
//            return response()->json(['success'=>false]);
//       }

        if(auth()->check())
        {
            $active_cart_id = session('active_cart_id');
            $cartItem = Cart::get($rowid);
            if(\request('number') == 0)
                CartProduct::where('main_cart_id', $active_cart_id)->where('product_id' , $cartItem->id)->delete();
            else
            CartProduct::where('main_cart_id' , $active_cart_id)->where('product_id' , $cartItem->id)->update(['number'=>\request('number')]);
        }

        Cart::update($rowid,\request('number'));
        session()->flash('message_type','success');
        session()->flash('message','Sepet güncellendi.');
        return response()->json(['success'=>true]);
    }
}
