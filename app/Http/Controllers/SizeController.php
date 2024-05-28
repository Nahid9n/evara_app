<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.size.index',[
            'sizes' => Size::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
//            'name' => 'required|unique:sizes,name',
//            'code' => 'required|unique:sizes,code'
        ],[
            'name.required'         => 'Size name field is required',
//            'name.unique'         => 'Size name field must be unique',
//            'code.required'         => 'Size code name field is required',
//            'code.unique'         => 'Size code field must be unique',
        ]);
        Size::newSize($request);
        return back()->with('message', 'Size info is created successfully.');

        /*
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required|unique:sub_categories,name',
        ],[
            'category_id.required' => 'Category Name field is required',
            'name.required' => 'Sub Category Name field is required',
            'name.unique' => 'Vai , ei nam ta already ase, r diyen na',
        ]);
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        Size::checkStatus($size);
        return back()->with('message','Size is updated');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('admin.size.edit',[
            'size' => $size
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        Size::updateSize($request, $size);
        return redirect('/size')->with('message','Size info update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        Size::deleteSize($size);
        return back()->with('message', 'Delete Size Successfully');
    }
}
