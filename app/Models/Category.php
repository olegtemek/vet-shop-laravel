<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'parent_id', 'seo_title', 'seo_description', 'slug'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function filters()
    {
        return $this->hasMany(Filter::class, 'category_id');
    }
    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
