<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProductCollection;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index($slug_productname)
    {
        $product = Product::whereSlug($slug_productname)->firstOrFail();
        $categories = $product->categories()->distinct()->get();


        $favorite_collections = FavoriteProductCollection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('product',compact('product','categories','favorite_collections'));
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
