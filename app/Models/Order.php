<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $fillable = ['main_cart_id','order_price','situation','name_surname','address','phone','mobile_phone','bank','number_installments'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public function MainCart()
    {
        return $this->belongsTo('App\Models\mainCart');
    }

}
