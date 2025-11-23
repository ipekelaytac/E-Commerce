<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagementUserController extends Controller
{

    public function login()
    {
        if (request()->isMethod('POST')) {
            $this->validate(request(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $credentials = [
                'email'       => request()->get('email'),
                'password'    => request()->get('password'),
                'isit_executive' => 1,
                'isit_active'    => 1
            ];

            if (Auth::guard('management')->attempt($credentials, request()->has('rememberme'))) {
                return redirect()->route('management.index');
            } else {
                return back()->withInput()->withErrors(['email' => 'Giriş hatalı veya yönetici değil.',]);
            }
        }

        return view('management.login');
    }

    public function logout()
    {
        Auth::guard('management')->logout();

        return redirect()->route('management.login');
    }
    public function index()
    {

            $list = User::orderByDesc('created_at')->get();


        return view('/management/user/users', compact('list'));
    }


    public function form($id = 0)
    {
        $entry = new User;
        if ($id > 0) {
            $entry = User::find($id);

        }

        return view('/management/user/form', compact('entry'));
    }

    public function save($id = 0)
    {
        $this->validate(request(), [
            'name_surname' => 'required',
            'email' => 'required|email|unique:user',
        ]);

        $data = request()->only('name_surname', 'email');
        if (request()->filled('password')) {
            $data['password'] = Hash::make(request('password'));
        }
        $data['isit_active'] = request()->has('isit_active') && request('isit_active') == 1 ? 1 : 0;
        $data['isit_executive'] = request()->has('isit_executive') && request('isit_executive') == 1 ? 1 : 0;


        $detail = request()->only('address', 'phone','mobile_phone');
        if ($id > 0) {
            $entry = User::where('id', $id)->firstOrFail();
            $entry->update($data);
            $entry->detail()->update($detail);

        } else {
            $entry = User::create($data);
            $entry->detail()->create($detail);
        }


        return redirect()
            ->route('management.user.save', $entry->id)
            ->with('message', ($id > 0 ? 'Güncellendi' : 'Kaydedildi'))
            ->with('message_type', 'success');
    }



    public function delete($id)
    {
        User::destroy($id);

        return redirect()
            ->route('management.user')
            ->with('message_type', 'success')
            ->with('message', 'Kayıt silindi');
    }
}
