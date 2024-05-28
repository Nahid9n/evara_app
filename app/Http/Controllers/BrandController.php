<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index',[
            'brands' => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request;
        $this->validate($request,[
            'name' => 'required'
        ],[
            'name.required'         => 'Brand name field is required',
        ]);
        Brand::newBrand($request);
        return back()->with('message', 'Brand info is created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        Brand::checkStatus($brand);
        return back()->with('message','Status is updated');

    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        Brand::updateBrand($request, $brand);
        return redirect('/brand')->with('message','brand info update successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    private static $brand;
    public function destroy(Brand $brand)
    {
        self::$brand = Brand::find($brand->id);
        if (self::$brand->image) {
            if (file_exists(self::$brand->image)) {
                unlink(self::$brand->image);
            }
        }
        self::$brand->delete();
        return back()->with('message','delete brand Successfully');
    }


}
