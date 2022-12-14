<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ManagementProductController extends Controller
{

    public function index()
    {
            $list = Product::orderByDesc('id')->get();

        return view('/management/product/products', compact('list'));
    }

    public function form($id = 0)
    {
        $entry = new product;
        $product_category = [];
        $product_brand = [];
        if ($id > 0) {
            $entry = Product::find($id);
            $product_category = $entry->categories()->pluck('category_id')->all();
            $product_brand= $entry->brand()->pluck('brand_id')->all();
        }

        $categories = Category::all();
        $brands = Brand::all();

        return view('/management/product/form', compact('entry', 'categories', 'product_category','brands','product_brand'));
    }

    public function save($id = 0)
    {
        $data = request()->only('product_name', 'slug', 'comment', 'price','stock');
        $data = preg_replace("/^<p.*?>/", "",$data);
        $data = preg_replace("|</p>$|", "",$data);

        if (!request()->filled('slug')) {
            $data['slug'] = Str::slug(request('product_name'), '-');
            request()->merge(['slug' => $data['slug']]);
        }

        $this->validate(request(), [
            'product_name' => 'required',
            'price' => 'required',
        ]);

        $show_slider = request('show_slider');
        $show_opportunity_of_the_day =\request('show_opportunity_of_the_day');
        $show_featured =\request('show_featured');
        $show_lots_selling =\request('show_lots_selling');
        $show_discount =\request('show_discount');
        $categories = request('categories');
        $brand = \request('brand');
        if ($id > 0) {
            $entry = Product::where('id', $id)->firstOrFail();
            $cart_products = CartProduct::where('product_id', $id)->get();
            $entry->update($data);
            $entry->detail()->updateOrCreate(
                ['product_id' => $entry->id],
                ['show_slider' => $show_slider,'show_opportunity_of_the_day' => $show_opportunity_of_the_day,
                    'show_featured' => $show_featured,'show_lots_selling' => $show_lots_selling,
                    'show_discount' => $show_discount]
            );
            $entry->categories()->sync($categories);
            $entry->brand()->sync($brand);
            foreach ($cart_products as $cart_product) {
                if ($cart_product->price != $data['price']){
                    CartProduct::where('id',$cart_product->id)->update([
                        'price' => $data['price'],
                    ]);
                }
            }
            }
            else {
            $entry = Product::create($data);
            $entry->detail()->updateOrCreate( ['product_id' => $entry->id],
                ['show_slider' => $show_slider,'show_opportunity_of_the_day' => $show_opportunity_of_the_day,
                    'show_featured' => $show_featured,'show_lots_selling' => $show_lots_selling,
                    'show_discount' => $show_discount]);
            $entry->categories()->attach($categories);
                    $entry->brand()->attach($brand);
        }


        if (request()->hasFile('product_image')) {
            $this->validate(request(), [
                'product_image' => 'image|mimes:jpg,png,jpeg,gif,webp|max:2048'
            ]);
            $product_image = request()->file('product_image');
            $filename = $entry->id . "-" . time() . "." . $product_image->extension();
            if ($product_image->isValid()) {
                File::delete('uploads/products/' . $entry->detail->product_image);

                $product_image->move('uploads/products', $filename);

                $entry->detail()->updateOrCreate(
                    ['product_id' => $entry->id],
                    ['product_image' => $filename]
                );
            }
        }


        return redirect()
            ->route('management.product.update', $entry->id)
            ->with('message', ($id > 0 ? 'G??ncellendi' : 'Kaydedildi'))
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $product->categories()->detach();
        $product->brand()->detach();
        $product->delete();

        return redirect()
            ->route('management.product')
            ->with('message', 'Kay??t silindi')
            ->with('message_type', 'success');
    }


    public function trash()
    {
    $list = Product::onlyTrashed()->get();
                return view('/management/product/trash', compact('list'));

    }
    public function trash_restore($id)
    {
        Product::where('id',$id)->restore();
        return redirect()
            ->route('management.product.trash')
            ->with('message', '??r??n Geri Y??klendi')
            ->with('message_type', 'success');
    }
    public function trash_remove($id)
    {
        $detail = ProductDetail::where('product_id', $id)->firstOrFail();

        File::delete('uploads/products/' . $detail->product_image);
        $detail->delete();
        Product::where('id', $id)->forceDelete();

        return redirect()
            ->route('management.product.trash')
            ->with('message', '??r??n Kald??r??ld??')
            ->with('message_type', 'success');

    }
}
