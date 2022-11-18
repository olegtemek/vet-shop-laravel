<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use App\Models\Filter;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = Filter::with('parent')->get();
        return view('admin.filter.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('child')->get();
        return view('admin.filter.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilterRequest $request)
    {
        Filter::create([
            'title' => $request->title,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.filter.index')->with('message', 'Фильтр был добавлен');
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
        $filter = Filter::find($id);
        $categories = Category::with('child')->get();
        return view('admin.filter.edit', compact('filter', 'categories'));
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
        Filter::find($id)->update([
            'title' => $request->title,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.filter.index')->with('message', 'Фильтр был изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filter::destroy($id);
        return redirect()->route('admin.filter.index')->with('message', 'Фильтр был удален');
    }
}
