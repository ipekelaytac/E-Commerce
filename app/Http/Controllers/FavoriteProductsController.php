<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use Illuminate\Http\Request;

class FavoriteProductsController extends Controller
{
    public function index()
    {
        $favorite_products = FavoriteProduct::where([
        ['user_id' ,'=', auth()->id()],
       ['favorite_product_category_id' ,'=', null],
])->orderByDesc('id')->get();

        return view('favorite_products', compact('favorite_products'));
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
