<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected  $guarded =[];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function categories()
    {
        return $this->belongsToMany('App\Models\category','category_product');
    }
    public function detail()
    {
        return $this->hasOne('App\Models\ProductDetail')->withDefault();
    }

}
