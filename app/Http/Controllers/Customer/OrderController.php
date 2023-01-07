<?php

namespace App\Http\Controllers\Customer;

use App\Models\Order;
use App\Models\ProductEvaluation;
use Illuminate\Support\Facades\File;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('MainCart')
            ->whereHas('MainCart', function($query) {
                $query->where('user_id', auth()->id());
            })
            ->orderByDesc('created_at')->get();
        return view('customer.orders',compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::with('MainCart.cartproducts.product')
            ->whereHas('MainCart', function($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('order.id', $id)
            ->firstOrFail();

        $evaluation = Order::with('MainCart')
            ->whereHas('MainCart', function($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('order.id', $id)
            ->where('order.situation', '=','Sipariş tamamlandı')
            ->count();

        $evaluation_product = ProductEvaluation::with('order.MainCart.cartproducts')
            ->where('user_id' , auth()->id())
            ->where('order_id',$id)
            ->get();
        return view('customer.order', compact('order','evaluation','evaluation_product'));
    }

    public function evaluation_save()
    {
        $controll = ProductEvaluation::where([
            ['user_id','=',auth()->id()],
            ['order_id','=',request('order_id')],
            ['product_id','=',request('product_id')],])
            ->count();
        if ($controll > 0) {
            ProductEvaluation::where([
                ['user_id', '=', auth()->id(),],
                ['order_id', '=', request('order_id')],
                ['product_id', '=', request('product_id')],

            ])
                ->update([
                    'point' => request('point'),
                    'comment' => request('comment'),
                    'user_id' => auth()->id(),
                    'product_id' => request('product_id'),
                    'order_id' => request('order_id'),
                ]);
        }
        else {
            ProductEvaluation::create([
                'point' => request('point'),
                'comment' => request('comment'),
                'user_id' => auth()->id(),
                'product_id' => request('product_id'),
                'order_id' => request('order_id'),
            ]);
        }

        $image = ProductEvaluation::where([
            ['user_id','=',auth()->id(),],
            ['order_id','=',request('order_id')],
            ['product_id','=',request('product_id')],])
            ->firstOrFail();


        if (request()->hasFile('comment_image')) {
            $this->validate(request(), [
                'comment_image' => 'image|mimes:jpg,png,jpeg,gif,webp|max:2048'
            ]);
            $comment_image = request()->file('comment_image');
            $filename =   $image->id . "-". time() . "." . $comment_image->extension();
            if ($comment_image->isValid()) {
                File::delete('uploads/comments/' . $image->comment_image);

                $comment_image->move('uploads/comments', $filename);
                $image->updateOrCreate(
                    ['id' => $image->id],
                    ['comment_image' => $filename],
                );
            }
        }

        return redirect()
            ->route('order',request('order_id'))
            ->with('message', 'Ürün Değerlendirildi.')
            ->with('message_type', 'success');
    }


}

