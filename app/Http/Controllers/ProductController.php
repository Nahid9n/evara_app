<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $product,$subCategories;

    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.add',[
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands'=>Brand::all(),
            'units' => Unit::all(),
            'colors' => Color::all(),
            'sizes' => Size::all()

        ]);
    }

    public function getSubCategoryByCategory()
    {
//        $id = $_GET['id'];

        $this->subCategories = SubCategory::where('category_id',$_GET['id'])->get();

//        return response()->json($id);
//        2nd
        return response()->json($this->subCategories);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
//            $this->validate($request,[
//                'name' => ['required', Rule::unique('colors')->ignore($color->id)],
//                'slug' => Rule::unique('colors')->ignore($color->id)
//            ]);

            $this->product = Product::newProduct($request);
            if ($request->colors){
                ProductColor::newProductColor($request->colors , $this->product->id);
            }
            ProductSize::newProductSize($request->sizes, $this->product->id);
            if ($request->other_images){
                ProductImage::newProductImage($request->other_images,$this->product->id);
            }
            return back()->with('message','Product info save successfully');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', [
            'product' => $product

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product,
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
            'colors' => Color::all(),
            'sizes' => Size::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        try {
            Product::updateProduct($request,$product);
            if ($request->colors){
                ProductColor::updateProductColor($request->colors,$product->id);
            }
            if ($request->sizes){
                ProductSize::updateProductSize($request->sizes,$product->id);
            }
            if ($request->other_images){
                ProductImage::updateProductImage($request->other_images,$product->id);
            }
            return redirect()->route('product.index')->with('message','Product info update successfully.');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::deleteProduct($product);
        return back()->with('message', 'Delete Product Successfully');
    }
}
