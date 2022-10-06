<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;



class mainCart extends Model
{
    use HasFactory;
    protected $table = "cart";
    protected  $guarded =[];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }


    public function cartproducts()
    {
        return $this->hasMany('App\Models\CartProduct');
    }

    public static function active_cart_id()
    {
        $active_cart = DB::table('cart as c')
            ->leftjoin('order as or','or.main_cart_id','=','c.id')
            ->where('c.user_id',auth()->id())
            ->whereRaw('or.id is null')
            ->orderByDesc('c.created_at')
            ->select('c.id')
            ->first();
        if (!is_null($active_cart)) return $active_cart->id;
    }


    public function cartproductnumber()
    {
        return DB::table('cart_product')->where('main_cart_id',$this->id)->sum('number');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
    public function detail()
    {
        return $this->hasOne('App\Models\ProductDetail')->withDefault();
    }
}
