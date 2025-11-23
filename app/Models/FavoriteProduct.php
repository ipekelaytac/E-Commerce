<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProduct extends Model
{
    use HasFactory;
    protected $table = "favorite_product";
    protected  $guarded =[];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public function favorite_user()
    {
        return $this->belongsToMany('App\Models\User','user_id');
    }
    public function favorite_category()
{
    return $this->belongsToMany('App\Models\Collection','collection_id');
}
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
