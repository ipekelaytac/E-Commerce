<?php

namespace App\Http\Controllers\Customer;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($slug_productname)
    {
        $product = Product::whereSlug($slug_productname)->firstOrFail();
        $categories = $product->categories()->distinct()->get();

        $favorite_collections = Collection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        $comments = DB::table('product_evaluation')
            ->join('user', 'product_evaluation.user_id', 'user.id')
            ->where('product_id', $product->id)
            ->get();
        $points = DB::table('product_evaluation')
            ->join('user', 'product_evaluation.user_id', 'user.id')
            ->where('product_id', $product->id)
            ->avg('point');
        $point = (int)$points;
        $brands =  $product->brand()->distinct()->get();

        return view('customer.product',compact('product','categories','favorite_collections','comments','point','brands'));
    }
    public function search()
    {
        $search = request()->input('search');
            $products = Product::where('product_name','like',"%$search%")
                ->orWhere('comment','like',"%$search%")
                ->get();
            request()->flash();
                        return view('customer.search',compact('products'));

    }
}
