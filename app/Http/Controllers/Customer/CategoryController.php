<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index($slug_categoryname)
    {
        $category = Category::where('slug' ,$slug_categoryname)->firstOrFail();
        $botcategories = Category::where('top_id', $category->id)->get();
        $topcategories= Category::find($category->top_id);
        $categories = Category::where('top_id',null)->get();

        $order = request('sırala');
        if ($order == 'cok-satanlar') {
            $products = $category->products()
                ->join('product_detail', 'product_detail.product_id', 'products.id')
                ->orderBy('product_detail.show_lots_selling', 'desc')
                ->get();
        }else if ($order == 'yeni') {
            $products = $category->products()->distinct()->OrderByDesc('created_at')->get();
        }
        else if ($order == 'fiyata-gore-artan') {
            $products = $category->products()->distinct()->OrderBy('price','ASC')->get();
        }
        else if ($order == 'fiyata-gore-azalan') {
            $products = $category->products()->distinct()->OrderByDesc('price')->get();
        }
        else{
            $products = $category->products()->distinct()->get();
        }

        return view('customer.category', compact( 'slug_categoryname','products','category','botcategories','topcategories','categories'));
    }
}
