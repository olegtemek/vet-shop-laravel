<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterProduct extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'filter_id'];
}
