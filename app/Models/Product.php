<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "products";
    protected  $guarded =[];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';


    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','category_product');
    }
    public function brand()
    {
        return $this->belongsToMany('App\Models\Brand','brand_product');
    }
    public function detail()
    {
        return $this->hasOne('App\Models\ProductDetail')->withDefault();
    }

}
