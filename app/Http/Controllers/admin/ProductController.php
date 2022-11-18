<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Filter;
use App\Models\FilterProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('parent')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('parent')->with('child')->get();
        $filters = Filter::all();
        return view('admin.product.create', compact('categories', 'filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $product = Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'seo_description' => $request->seo_description,
            'slug' => Str::slug($request->title),
            'seo_title' => $request->seo_title,
        ]);

        foreach (explode(',', $request->filters) as $filter) {
            FilterProduct::create([
                'product_id' => $product->id,
                'filter_id' => $filter
            ]);
        }

        return redirect()->route('admin.product.index')->with('message', 'Продукт был добавлен');
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
        $product = Product::with('filters')->find($id);
        $categories = Category::with('parent')->with('child')->get();
        $filters = Filter::all();
        $filters_product = FilterProduct::where('product_id', $id)->get();
        return view('admin.product.edit', compact('product', 'categories', 'filters', 'filters_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        Product::find($id)->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $request->image,
            'price' => $request->price,
            'seo_description' => $request->seo_description,
            'slug' => Str::slug($request->title),
            'seo_title' => $request->seo_title,
        ]);

        FilterProduct::where('product_id', $id)->delete();

        foreach (explode(',', $request->filters) as $filter) {
            FilterProduct::create([
                'product_id' => $id,
                'filter_id' => $filter
            ]);
        }

        return redirect()->route('admin.product.index')->with('message', 'Продукт был изменен');
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
