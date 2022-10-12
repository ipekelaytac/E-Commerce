<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProductCategory extends Model
{
    use HasFactory;
    protected $table = "favorite_product_category";
    protected  $guarded =[];
    public $timestamps = false;

}
