<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'adminCategories' => Category::latest()->simplePaginate(100),
        ]);
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'name' => 'required|unique:categories,name'
            ],[
                'name.required'         => 'Category name field is required',
                'name.unique' => 'This Name is Already Have'
            ]);
            Category::newCategory($request);

            return back()->with('message', 'Category info create successfully.');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
    public function show(Category $category)
    {
        Category::checkStatus($category);
        return back()->with('message','Status is updated');
    }

    public function update(Request $request, Category $category)
    {
        try {
            $this->validate($request,[
                'name' => ['required', Rule::unique('categories')->ignore($category->id)],
                'slug' => [ Rule::unique('categories')->ignore($category->id)],
            ]);

            Category::updateCategory($request, $category);
            return back()->with('message', 'category info update successfully.');
        }
        catch (Exception $e){
           return back()->with('error', $e->getMessage());
        }
    }
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
