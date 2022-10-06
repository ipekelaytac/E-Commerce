<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected  $guarded =[];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function products()
    {
        return $this->belongsToMany('App\Models\product','category_product');
    }

    public function bot_categories()
    {
        return $this->hasMany('App\Models\category', 'top_id', 'id');
    }

    public function top_category() {
        return $this->belongsTo('App\Models\category', 'top_id')->withDefault([
            'category_name' => 'Ana Kategori'
        ]);
    }
}
