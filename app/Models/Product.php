<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'category_id', 'description', 'price', 'seo_title', 'seo_description', 'slug'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function filters()
    {
        return $this->hasMany(FilterProduct::class, 'product_id');
    }
}
