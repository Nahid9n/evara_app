<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index', [
            'sub_categories' => SubCategory::latest()->simplePaginate(100),
        ]);
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'category_id' => 'required',
                'name' => 'required',
            ],[
                'category_id.required' => 'Category Name field is required',
                'name.required' => 'Sub Category Name field is required',
            ]);
            SubCategory::newSubCategory($request);
            return back()->with('message','Sub Category info create successfully.');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function update(Request $request, SubCategory $subCategory)
    {
        try {
            $this->validate($request,[
                'category_id' => 'required',
                'name' => 'required',
                'slug' => [ Rule::unique('sub_categories')->ignore($subCategory->id)],
            ],[
                'category_id.required' => 'Category Name field is required',
                'name.required' => 'Sub Category Name field is required',
            ]);
            SubCategory::updateSubCategory($request, $subCategory);
            return back()->with('message', 'Sub category info update successfully.');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    private static $subCategory;
    public function destroy(SubCategory $subCategory)
    {
        try {
            self::$subCategory = SubCategory::find($subCategory->id);
            if (self::$subCategory->image) {
                if (file_exists(self::$subCategory->image)) {
                    unlink(self::$subCategory->image);
                }
            }
            self::$subCategory->delete();
            return back()->with('message','Delete Sub category Successfully');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
