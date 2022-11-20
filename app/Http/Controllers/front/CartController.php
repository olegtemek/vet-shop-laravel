<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $req)
    {
        if ($req->id) {
            $product_id = $req->id;
            $product = Product::find($product_id);
            return $product;
        } else {
            return 'pizda';
        }
    }
}
