<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProductCollection extends Model
{
    use HasFactory;
    protected $table = "favorite_product_collection";
    protected  $guarded =[];
    public $timestamps = false;

}
