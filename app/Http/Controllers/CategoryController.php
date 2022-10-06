<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index($slug_categoryname)
    {
        $categories = Category::where('slug' ,$slug_categoryname)->firstOrFail();
        $botcategories = Category::where('top_id', $categories->id)->get();
        $topcategories= category::find($categories->top_id);

        $order = request('sırala');
        if ($order == 'coksatanlar') {
            $products = $categories->products()
                ->join('product_detail', 'product_detail.product_id', 'products.id')
                ->orderBy('product_detail.show_lots_selling', 'desc')
                ->get();
        }else if ($order == 'yeni') {
            $products = $categories->products()->distinct()->OrderByDesc('created_at')->get();
        }
        else{
            $products = $categories->products()->distinct()->get();
        }

        return view('category', compact( 'products','categories','botcategories','topcategories'));
    }
}
