<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
