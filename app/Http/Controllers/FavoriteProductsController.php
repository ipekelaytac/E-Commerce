<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProduct;
use App\Models\FavoriteProductCollection;
use App\Models\product;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Str;


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

    public function collection()
    {
        $favorite_collections = FavoriteProductCollection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('favorite_collection', compact('favorite_collections'));
    }

    public function collection_product($slug_collectionname)
    {
        $favorite_collection = FavoriteProductCollection::whereSlug($slug_collectionname)->firstOrFail();

        $favorite_products = FavoriteProduct::where([
            ['user_id' ,'=', auth()->id()],
            ['favorite_product_collection_id' ,'=', $favorite_collection->id],])
            ->orderByDesc('id')->get();
        $favorite_collections = FavoriteProductCollection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('favorite_collection_product', compact('favorite_products','favorite_collection','favorite_collections'));
    }

    public function collection_add()
    {
        $slug = Str::slug(request('collection_name'), '-');
        FavoriteProductCollection::create([
            'user_id' => auth()->id(),
            'collection_name'=>request('collection_name'),
            'slug'=>$slug,
        ]);

        return redirect()
            ->route('collection')
            ->with('message', 'Koleksiyon eklendi.')
            ->with('message_type', 'success');
    }
    public function collection_delete($id)
    {
        $collection = FavoriteProductCollection::find($id);
        $collection->delete();

        return redirect()
            ->route('collection')
            ->with('message', 'Koleksiyon silindi')
            ->with('message_type', 'success');
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
