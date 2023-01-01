<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ManagementCategoryController extends Controller
{
    public function index()
    {
        if (request()->filled('search') || request()->filled('top_id')) {
            request()->flash();
            $search = request('search');
            $top_id = request('top_id');
            $list = Category::with('top_category')
                ->where('category_name', 'like', "%$search%")
                ->where('top_id', $top_id)
                ->orderByDesc('id')
                ->paginate(999999)
                ->appends(['search' => $search, 'top_id' => $top_id]);
        } else {
            request()->flush();
            $list = Category::with('top_category')->orderByDesc('id')->paginate(999999);
        }
        $topcategories = Category::whereRaw('top_id is null')->get();
        return view('/management/category/category', compact('list', 'topcategories'));
    }

    public function form($id = 0)
    {
        $entry = new category;
        if ($id > 0) {
            $entry = Category::find($id);
        }

        $categories = Category::all();

        return view('/management/category/form', compact('entry', 'categories'));
    }

    public function save($id = 0)
    {
        $data = request()->only('category_name', 'slug', 'top_id');


        if (!request()->filled('slug')) {
            $data['slug'] = Str::slug(request('category_name'), '-');
            request()->merge(['slug' => $data['slug']]);
        }
        $this->validate(request(), [
            'category_name' => 'required',
        ]);

        if ($id > 0) {
            $entry = Category::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = Category::create($data);
        }

        return redirect()
            ->route('management.category.update', $entry->id)
            ->with('message', ($id > 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category_product_number = $category->products()->count();
        if ($category_product_number>0)
        {
            return redirect()
                ->route('management.category')
                ->with('message', "Bu kategoride $category_product_number adet ürün var. Bu yüzden silme işlemi yapılmamıştır.")
                ->with('message_type', 'warning');
        }
        $category->products()->detach();
        $category->delete();

        return redirect()
            ->route('management.category')
            ->with('message', 'Kayıt silindi')
            ->with('message_type', 'success');
    }
}
