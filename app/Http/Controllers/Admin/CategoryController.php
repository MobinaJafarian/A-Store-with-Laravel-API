<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'لیست دسته بندی';
        return view('admin.category.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'ایجاد دسته بندی';
        $categories = Category::query()->pluck('title' , 'id');
        return view('admin.category.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = Category::saveImage($request->file);
        Category::query()->create([
            'title' => $request->input('title'),
            'parent_id' => $request->input('parent_id'),
            'image' => $image
        ]);
        return redirect()->route('category.index')->with('message', 'دسته بندی با موفقیت ایجاد شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::query()->find($id);
        $categories = Category::query()->pluck('title','id');
        return view('admin.category.edit', compact('categories','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Category::saveImage($request->file);
        $category = Category::query()->find($id);
        $categories = Category::query()->pluck('title','id');
        $category->update([
            'title' => $request->input('title'),
            'parent_id' => $request->input('parent_id'),
            'image' => $image
        ]);
        return redirect()->route('category.index')->with('message', 'دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
