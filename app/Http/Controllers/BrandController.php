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
                'brands' => Brand::latest()->simplePaginate(100),
            ]);
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

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
            return back()->with('message','brand info update successfully.');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
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
