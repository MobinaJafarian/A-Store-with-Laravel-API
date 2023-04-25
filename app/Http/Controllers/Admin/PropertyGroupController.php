<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyGroup;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'لیست گروه ویژگی ها';
        return view('admin.property_group.list', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'ایجاد گروه ویژگی ها';
        return view('admin.property_group.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PropertyGroup::query()->create([
            'title' => $request->input('title'),
        ]);

        return redirect()->route('property_groups.index')->with('message', 'لیست ویژگی ها با موفقیت ایجاد شد');

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
        $property_group = PropertyGroup::query()->find($id);
        $title = 'ویرایش گروه ویژگی ها';
        return view('admin.property_group.edit', compact('title','property_group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property_group = PropertyGroup::query()->find($id);
        $property_group->update([
            'title' => $request->input('title'),
        ]);
        return redirect()->route('property_groups.index')->with('message', 'لیست ویژگی ها با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
