<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\File;

class ManagementBrandController extends Controller
{
    public function index(){
        $list = Brand::orderByDesc('id')->get();

        return view('management.brand.brand' ,compact('list'));
    }

    public function form($id= 0){
        $entry = new brand;
    if ($id > 0) {
        $entry = Brand::find($id);
    }
        return view('management.brand.form' ,compact('entry'));
    }

    public function save($id = 0)
    {
        $data = request()->only('brand_name');


        $this->validate(request(), [
            'brand_name' => 'required',
        ]);

        if ($id > 0) {
            $entry = Brand::where('id', $id)->firstOrFail();
            $entry->update($data);
        } else {
            $entry = Brand::create($data);
        }

        if (request()->hasFile('brand_image')) {
            $this->validate(request(), [
                'brand_image' => 'image|mimes:jpg,png,jpeg,gif,webp|max:2048'
            ]);
            $brand_image = request()->file('brand_image');
            $filename = $entry->id . "-" . time() . "." . $brand_image->extension();
            if ($brand_image->isValid()) {
                File::delete('uploads/brands/' . $entry->brand_image);

                $brand_image->move('uploads/brands', $filename);

                $entry->updateOrCreate(
                    ['id' => $entry->id],
                    ['brand_image' => $filename]
                );
            }
        }

        return redirect()
            ->route('management.brand.update', $entry->id)
            ->with('message', ($id > 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);

        $brand->product()->detach();
        File::delete('uploads/brands/' . $brand->brand_image);
        $brand->delete();

        return redirect()
            ->route('management.brand')
            ->with('message', 'Kayıt silindi')
            ->with('message_type', 'success');
    }


}
