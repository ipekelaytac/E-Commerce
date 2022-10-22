<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use App\Models\FavoriteProductCollection;
use App\Models\ProductEvaluation;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index($slug_productname)
    {
        $product = Product::whereSlug($slug_productname)->firstOrFail();
        $categories = $product->categories()->distinct()->get();

        $favorite_collections = FavoriteProductCollection::where('user_id' , auth()->id())
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
        return view('product',compact('product','categories','favorite_collections','comments','point'));
    }
    public function search()
    {
        $search = request()->input('search');
            $products = Product::where('product_name','like',"%$search%")
                ->orWhere('comment','like',"%$search%")
                ->get();
            request()->flash();
                        return view('search',compact('products'));

    }
}
