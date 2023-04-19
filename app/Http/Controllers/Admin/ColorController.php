<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "لیست رنگ ها";
        return  view('admin.color.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "ایجاد رنگ ";
        return view('admin.color.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Color::query()->create([
            'name' => $request->input('name'),
            'code' => $request->input('code'),
        ]);
        return redirect()->route('colors.index')->with('message','رنگ با موفقیت ذخیره شد');
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
        $title = "ویرایش رنگ ";
        $color = Color::query()->find($id);
        return view('admin.color.edit', compact('title','color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Color::query()->find($id)->update([
            'name'=>$request->input('name'),
            'code'=>$request->input('code')
        ]);

        return redirect()->route('colors.index')->with('message','رنگ با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
