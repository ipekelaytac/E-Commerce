<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductDetail;
use http\Client\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{

    public function index()
    {
        $brands = Brand::all();

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
            ->get();



        return view('customer.index', compact('brands', 'products_slider', 'product_opportunity_of_the_day', 'products_featured', 'products_lots_selling', 'products_discount'));
    }
}
