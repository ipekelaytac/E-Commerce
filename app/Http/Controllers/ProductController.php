<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index($slug_productname)
    {
        $product = Product::whereSlug($slug_productname)->firstOrFail();
        $categories = $product->categories()->distinct()->get();
        return view('product',compact('product','categories'));
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
