<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('parent')->get();
        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id == 0 ? null : $request->parent_id,
            'seo_title' => $request->seo_title,
            'slug' => Str::slug($request->title),
            'seo_description' => $request->seo_description,
        ]);

        return redirect()->route('admin.category.index')->with('message', 'Категория была успешно добавлена');
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
        $cat = Category::find($id);
        $categories = Category::with('parent')->get();
        return view('admin.category.edit', compact('cat', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {

        Category::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id == 0 ? null : $request->parent_id,
            'seo_title' => $request->seo_title,
            'slug' => Str::slug($request->title),
            'seo_description' => $request->seo_description,
        ]);

        return redirect()->route('admin.category.index')->with('message', 'Категория была успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.category.index')->with('message', 'Категория была успешно удалена');
    }
}
