<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use App\Models\FavoriteProductCollection;
use App\Models\product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class FavoriteProductsController extends Controller
{
    public function index()
    {
        $favorite_products = FavoriteProduct::
//        where('user_id' , auth()->id())
        where([['user_id' ,'=', auth()->id()],
        ['favorite_product_collection_id' ,'=', null],])
            ->orderByDesc('id')->get();
        $favorite_collections = FavoriteProductCollection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('favorite_products', compact('favorite_products','favorite_collections'));
    }

    public function collection($slug_collectionname)
    {
        $favorite_collection = FavoriteProductCollection::whereSlug($slug_collectionname)->firstOrFail();

        $favorite_products = FavoriteProduct::where([
            ['user_id' ,'=', auth()->id()],
            ['favorite_product_collection_id' ,'=', $favorite_collection->id],])
            ->orderByDesc('id')->get();
        $favorite_collections = FavoriteProductCollection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('favorite_products', compact('favorite_products','favorite_collections'));
    }


    public function add()
    {
        $product = Product::find(\request('id'));
            FavoriteProduct::create([
                'user_id' => auth()->id(),
                'product_id'=>request('id'),
            ]);

        return redirect()
            ->route('products', $product->slug)
            ->with('message', 'Favorilere eklendi.')
            ->with('message_type', 'success');
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
