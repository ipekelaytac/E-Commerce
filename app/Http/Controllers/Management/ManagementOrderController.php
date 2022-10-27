<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ManagementOrderController extends Controller
{


    public function index()
    {

            $list = Order::with('MainCart.user')
                ->orderByDesc('id')
                ->get();

        return view('/management/order/order', compact('list'));
    }

public function form($id = 0)
    {
        if ($id > 0) {
            $entry = Order::with('MainCart.cartproducts.product')->find($id);
        }
        return view('management.order.form', compact('entry'));
    }

    public function save($id = 0)
    {
        $this->validate(request(), [
            'situation'   => 'required'
        ]);

        $data = request()->only( 'situation');

        if ($id > 0) {
            $entry = Order::where('id', $id)->firstOrFail();
            $entry->update($data);
        }

        return redirect()
            ->route('management.order.update', $entry->id)
            ->with('message', 'Güncellendi')
            ->with('message_type', 'success');
    }

    public function delete($id)
    {
        Order::destroy($id);

        return redirect()
            ->route('management.order')
            ->with('message', 'Kayıt silindi')
            ->with('message_type', 'success');
    }

    public function trash()
    {
        $list = Order::onlyTrashed()->get();
        return view('/management/order/trash', compact('list'));

    }
    public function trash_restore($id)
    {
        Order::where('id',$id)->restore();


        return redirect()
            ->route('management.order.trash')
            ->with('message', 'Sipariş Geri Yüklendi')
            ->with('message_type', 'success');
    }
    public function trash_remove($id)
    {

        Order::where('id', $id)->forceDelete();

        return redirect()
            ->route('management.order.trash')
            ->with('message', 'Sipariş Kaldırıldı')
            ->with('message_type', 'success');

    }
}
