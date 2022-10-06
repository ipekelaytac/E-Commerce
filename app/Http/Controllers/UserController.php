<?php

namespace App\Http\Controllers;

use App\Mail\UserRecordMail;
use App\Models\CartProduct;
use App\Models\mainCart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;



class UserController extends Controller
{
    public function login_form()
    {
        return view('user.login');
    }

    public function login()
    {
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $credentials=[
            'email'=>request('email'),
            'password'=>request('password'),
            'isit_active'    => 1
        ];
        if (auth()->attempt($credentials,\request()->has('remember_me')))
        {
            \request()->session()->regenerate();

            $active_cart_id = mainCart::active_cart_id();
            if(is_null($active_cart_id))
            {
                $active_cart = mainCart::create(['user_id'=>auth()->id()]);
                $active_cart_id = $active_cart->id;
            }
            session()->put('active_cart_id',$active_cart_id);
            if (Cart::count()>0)
            {
                foreach (Cart::content() as $cartItem)
                {
                    CartProduct::updateOrCreate(
                        ['main_cart_id'=>$active_cart_id,'product_id'=>$cartItem->id],
                        ['number'=>$cartItem->qty,'price'=>$cartItem->price,'situation'=>'beklemede']
                    );
                }
            }
            Cart::destroy();
            $cartProducts = CartProduct::where('main_cart_id',$active_cart_id)->get();
            foreach ($cartProducts as $cartProduct)
            {
                Cart::add($cartProduct->product->id,$cartProduct->product->product_name,$cartProduct->number,$cartProduct->product->price);
            }
            return redirect()->intended('/');
        }
        else{
            $errors =[
                'email'=>'Hatalı giriş veya mail aktif değil ',
            ];
            return back()->withErrors($errors);


             }
    }
    public function register_form()
    {
        return view('user.register');
    }
    public function register()
    {
        $this->validate(request(),[
            'name_surname'=>'required|min:5|max:60',
        'email'=>'required|email|unique:user',
        'password' =>'required|confirmed'
    ]);
        $user = User::create([
           'name_surname'=>request('name_surname'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password')),
            'activation_key'=>Str::Random(60),
            'isit_active'=>0
        ]);
        $user->detail()->save(new UserDetail());

        Mail::to(request('email'))->send(new UserRecordMail($user));
        auth()->login($user);
        return redirect()->route('index');
    }
    public function activate($key)
    {
        $user = User::where('activation_key',$key)->first();
        if (!is_null($user))
        {
            $user->activation_key = null;
            $user->isit_active = 1;
            $user->save();
            return redirect()->route('index')
                ->with('message','kullanıcı kaydınız aktifleştirildi')
                ->with('message_type','success');
        }
        else{
            return redirect()->route('index')
                ->with('message_type','warning')
                ->with('message','kullanıcı kaydınız aktifleştirilemedi.');

        }
    }
    public function logout()
    {
        auth()->logout();
        \request()->session()->flush();
        \request()->session()->regenerate();
        return redirect()->route('index');
    }
}
