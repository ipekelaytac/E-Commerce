<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table="brand";
    public $timestamps = false;
    protected  $guarded =[];

    public function product()
    {
        return $this->belongsToMany('App\Models\product','brand_product');
    }
}