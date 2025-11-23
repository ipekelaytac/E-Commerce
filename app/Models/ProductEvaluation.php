<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEvaluation extends Model
{
    use HasFactory;
    protected $table="product_evaluation";
    protected  $guarded =[];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public function user()
    {
        return $this->belongsToMany('App\Models\User','user_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
}
