<?php

namespace App\Http\Controllers\Customer;

use App\Models\FavoriteProduct;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Support\Str;


class FavoriteProductController extends Controller
{
    public function index()
    {
        $favorite_products = FavoriteProduct::
//        where('user_id' , auth()->id())
        where([['user_id' ,'=', auth()->id()],
        ['collection_id' ,'=', null],])
            ->orderByDesc('id')->get();
        $favorite_collections = Collection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('customer.favorite_products', compact('favorite_products','favorite_collections'));
    }

    public function add()
    {
        $product = Product::find(\request('id'));
        $empty = FavoriteProduct::where('user_id', auth()->id())
            ->where('product_id',request('id'))
            ->where('collection_id',NULL)
            ->count();
        if($empty==0){
            FavoriteProduct::create([
                'user_id' => auth()->id(),
                'product_id'=>request('id'),
            ]);
        }
        else{
            return redirect()
                ->route('products', $product->slug)
                ->with('message', 'Bu ürün favorilerde var!')
                ->with('message_type', 'warning');
        }
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

    public function collection()
    {
        $favorite_collections = Collection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();


        return view('customer.collections', compact('favorite_collections'));
    }

    public function collection_product($slug_collectionname)
    {
        $favorite_collection = Collection::whereSlug($slug_collectionname)->firstOrFail();

        $favorite_products = FavoriteProduct::where([
            ['user_id' ,'=', auth()->id()],
            ['collection_id' ,'=', $favorite_collection->id],])
            ->orderByDesc('id')->get();
        $favorite_collections = Collection::where('user_id' , auth()->id())
            ->orderByDesc('id')->get();

        return view('customer.collection_products', compact('favorite_products','favorite_collection','favorite_collections'));
    }

    public function collection_add()
    {
        $slug = Str::slug(request('collection_name'), '-');
        Collection::create([
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
        $collection = Collection::find($id);
        $collection->delete();

        return redirect()
            ->route('collection')
            ->with('message', 'Koleksiyon silindi')
            ->with('message_type', 'success');
    }
    public function collection_product_add()
    {
        $product = Product::find(\request('product_id'));
        $empty = FavoriteProduct::where('user_id', auth()->id())
            ->where('product_id',request('product_id'))
            ->where('collection_id',request('collection_id'))
            ->count();
        if($empty==0){
            FavoriteProduct::create([
                'user_id' => auth()->id(),
                'product_id'=>request('product_id'),
                'collection_id'=>request('collection_id'),
            ]);
        }
        else{
            return redirect()
                ->route('products', $product->slug)
                ->with('message', 'Bu koleksiyonda ürün var!')
                ->with('message_type', 'warning');
        }
        return redirect()
            ->route('products', $product->slug)
            ->with('message', 'Koleksiyona eklendi.')
            ->with('message_type', 'success');
    }
}
