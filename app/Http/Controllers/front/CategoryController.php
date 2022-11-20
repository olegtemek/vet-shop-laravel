<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductFilter $req, $slug)
    {
        $data['category'] = Category::with('filters')->where('slug', $slug)->first();

        $data['products'] = Product::where('category_id', $data['category']->id)->filter($req)->get();


        if (isset($_GET['filters_id'])) {
            $data['filters_id'] = explode(',', $_GET['filters_id']);
            if (empty($data['filters_id'][0])) {
                return redirect()->route('front.category.index', $slug);
            }
        }

        $data['seo_title'] = $data['category']->seo_title;
        $data['seo_description'] = $data['category']->seo_description;
        return view('front.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
