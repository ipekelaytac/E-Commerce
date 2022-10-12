<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Models\category;

class IndexController extends Controller
{
    public function index()
    {
        $categories = category::whereRaw('top_id is null')->take(8)->get();

        $products_slider = ProductDetail::with('product')
            ->where('show_slider', 1)
            ->orderBy('updated_at', 'desc')
            ->take(3)->get();

        $product_opportunity_of_the_day = ProductDetail::with('product')
            ->where('show_opportunity_of_the_day', 1)
            ->orderBy('updated_at', 'desc')
            ->take(1)->get();

        $products_featured = ProductDetail::with('product')
            ->where('show_featured', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)->get();


        $products_lots_selling = ProductDetail::with('product')
            ->where('show_lots_selling', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)->get();


        $products_discount = ProductDetail::with('product')
            ->where('show_discount', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)->get();


        return view('index', compact('categories', 'products_slider', 'product_opportunity_of_the_day', 'products_featured', 'products_lots_selling', 'products_discount'));
    }
}
