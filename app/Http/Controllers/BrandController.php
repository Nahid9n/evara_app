<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.brand.index',[
                'brands' => Brand::latest()->get(),
            ]);
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.brand.add');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'name' => 'required'
            ],[
                'name.required'         => 'Brand name field is required',
            ]);
            Brand::newBrand($request);
            return back()->with('message', 'Brand info is created successfully.');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        try {
            Brand::checkStatus($brand);
            return back()->with('message','Status is updated');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }


    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Brand $brand)
    {
        try {
            return view('admin.brand.edit', [
                'brand' => $brand
            ]);
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        try {
            $this->validate($request,[
                'name' => 'required',
                'slug' => [ Rule::unique('brands')->ignore($brand->id)],
            ],[
                'name.required'         => 'Brand name field is required',
            ]);
            Brand::updateBrand($request, $brand);
            return redirect()->route('brand.index')->with('message','brand info update successfully.');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }
    /**
     * Remove the specified resource from storage.
     */
    private static $brand;
    public function destroy(Brand $brand)
    {
        try {
            self::$brand = Brand::find($brand->id);
            if (self::$brand->image) {
                if (file_exists(self::$brand->image)) {
                    unlink(self::$brand->image);
                }
            }
            self::$brand->delete();
            return back()->with('message','delete brand Successfully');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }

    }


}
