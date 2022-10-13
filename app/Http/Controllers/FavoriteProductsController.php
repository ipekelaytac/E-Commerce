<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use App\Models\FavoriteProductCategory;
use Illuminate\Http\Request;

class FavoriteProductsController extends Controller
{
    public function index()
    {
        $favorite_products = FavoriteProduct::where('user_id' , auth()->id())
//        where([['user_id' ,'=', auth()->id()],
//        ['favorite_product_category_id' ,'=', null],])
            ->orderByDesc('id')->get();
        $favorite_categories = FavoriteProductCategory::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('favorite_products', compact('favorite_products','favorite_categories'));
    }

    public function category($slug_categoryname)
    {
        $favorite_category = FavoriteProductCategory::whereSlug($slug_categoryname)->firstOrFail();

        $favorite_products = FavoriteProduct::where([
            ['user_id' ,'=', auth()->id()],
            ['favorite_product_category_id' ,'=', $favorite_category->id],])
            ->orderByDesc('id')->get();
        $favorite_categories = FavoriteProductCategory::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('favorite_products', compact('favorite_products','favorite_categories'));
    }


    public function add()
    {
//        $data = request()->only('favorite_product_category_id');
//
//
//            $entry = FavoriteProduct::create($data);
//            $entry = FavoriteProduct::create([
//                'user_id' => auth()->id(),
//                'product_id'=>$entry->id,
//            ]);
//
//        return redirect()
//            ->route('management.product.add', $entry->id)
//            ->with('message', 'Favorilere eklendi.')
//            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $favorite_products = FavoriteProduct::find($id);
        $favorite_products->delete();

        return redirect()
            ->route('favorite_products')
            ->with('message', 'Ürün silindi')
            ->with('message_type', 'success');
    }

}
