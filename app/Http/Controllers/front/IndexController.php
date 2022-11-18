<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data['products'] = Product::orderByDesc('created_at')->limit(6)->get();
        $data['seo_title'] = 'Главная';
        $data['seo_description'] = 'Главная описание';
        return view('front.home.index', compact('data'));
    }
}
