<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sub-category.index', [
            'sub_categories' => SubCategory::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sub-category.add', [
            'categories' => Category::all()
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        $this->validate($request,[
//            'category_id' => 'required',
//            'name' => 'required|unique:sub_categories,name',
//            'email' => 'email',
//        ],[
//            'category_id.required' => 'Category Name field is required',
//            'name.required' => 'Sub Category Name field is required',
//            'name.unique' => 'Vai , ei nam ta already ase, r diyen na',
//            'email.email' => 'vua email diyen na',
//        ]);
////        return $request;
//        SubCategory::newSubCategory($request);
//        return back()->with('message','Sub Category info create successfully.');
//    }


// 2nd =========================================
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
        ],[
            'category_id.required' => 'Category Name field is required',
            'name.required' => 'Sub Category Name field is required',
//            'name.unique' => 'Vai , ei nam ta already ase, r diyen na',
        ]);
//        return $request;
        SubCategory::newSubCategory($request);
        return back()->with('message','Sub Category info create successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        SubCategory::checkStatus($subCategory);
        return back()->with('message','Status is updated');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        return view('admin.sub-category.edit', [
            'categories' => Category::all(),
            'sub_category' => $subCategory
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        SubCategory::updateSubCategory($request, $subCategory);
        return redirect('/sub-category')->with('message', 'Sub category info update successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    private static $subCategory;
    public function destroy(SubCategory $subCategory)
    {
        self::$subCategory = SubCategory::find($subCategory->id);
        if (self::$subCategory->image) {
            if (file_exists(self::$subCategory->image)) {
                unlink(self::$subCategory->image);
            }
        }
        self::$subCategory->delete();
        return back()->with('message','Delete Sub category Successfully');
    }

    /*

    public function destroy(SubCategory $subCategory)
    {
        SubCategory::deleteSubCategory($subCategory);
        return back()->with('message', 'Delete Sub category Successfully');
    }

    */

}
