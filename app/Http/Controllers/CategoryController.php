<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //    public function index()
    //    {
    //        return view('admin.category.index',[
    //            'categories' => Category::all()
    //        ]);
    //    }
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }
    /**
     * Store a newly created resource in storage.
     */
    //    public function store(Request $request)
    //    {
    ////        return $request;
    //        Category::saveInfo($request);
    //        return redirect(route('category.index'));
    //    }
    //====================================
    public function store(Request $request)
    {

//        return $request;
        $this->validate($request,[
            'name' => 'required|unique:categories,name'
        ],[
            'name.required'         => 'Category name field is required',
            'name.unique' => 'Vai , ei nam ta already ase, r diyen na'
        ]);
        Category::newCategory($request);

        return back()->with('message', 'Category info create successfully.');
    }
    /**
     * Display the specified resource.
     */
    //    public function show(string $id)
    //    {
    //        Category::checkStatus($id);
    //        return back();
    //    }
    //checkStatus
    public function show(Category $category)
    {
        Category::checkStatus($category);
        return back()->with('message','Status is updated');
    }


    /**
     * Show the form for editing the specified resource.
     */
    //    public function edit(string $id)
    //    {
    //        return view('admin.category.edit',[
    //            'category' => Category::find($id)
    //        ]);
    //    }

    public function edit(Category $category)
    {
//        return $category;
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    //    public function update(Request $request, string $id)
    //    {
    //        Category::saveInfo($request , $id);
    //        return redirect(route('category.index'));
    //    }

    public function update(Request $request, Category $category)
    {
        if($category->name != $request->name)
        {
            $this->validate($request,[
                'name' => 'required|unique:categories,name'
            ],[
                'name.required'         => 'Category name field is required',
                'name.unique' => 'Vai , ei nam ta already ase, r diyen na'
            ]);
        }

        Category::updateCategory($request, $category);
        return redirect('/category')->with('message', 'category info update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */

    //    public function destroy(string $id)
    //    {
    //        self::$category = Category::find($id);
    //        if (self::$category->image) {
    //            if (file_exists(self::$category->image)) {
    //                unlink(self::$category->image);
    //            }
    //        }
    //        self::$category->delete();
    //        return back();
    //    }
    private static $category;
    public function destroy(Category $category)
    {
        self::$category = Category::find($category->id);
        if (self::$category->image) {
            if (file_exists(self::$category->image)) {
                unlink(self::$category->image);
            }
        }
        self::$category->delete();
        return back()->with('message','delete Category Successfully');
    }

}
