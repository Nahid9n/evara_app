<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
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
use App\Models\Vendor;
use Illuminate\Http\Request;
use Session;

class VendorProductController extends Controller
{
    private $product;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.vendor.manage-product', [
            'products' => Product::where('vendor_id', Session::get('vendor_id'))->get(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vendor.add-product', [
            'categories'    => Category::all(),
            'sub_categories'=> SubCategory::all(),
            'brands'        => Brand::all(),
            'units'         => Unit::all(),
            'colors'        => Color::all(),
            'sizes'         => Size::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->product = Product::newProduct($request, Session::get('vendor_id'));
        ProductColor::newProductColor($request->colors , $this->product->id);
        ProductSize::newProductSize($request->sizes, $this->product->id);
        ProductImage::newProductImage($request->other_images, $this->product->id);
        return back()->with('message','Product info save successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.vendor.show-product', ['product' => Product::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.vendor.edit-product', [
            'categories'    => Category::all(),
            'sub_categories'=> SubCategory::all(),
            'brands'        => Brand::all(),
            'units'         => Unit::all(),
            'colors'        => Color::all(),
            'sizes'         => Size::all(),
            'product'       => Product::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->product = Product::find($id);
        Product::updateProduct($request, $this->product);
        ProductColor::updateProductColor($request->colors, $this->product->id);
        ProductSize::updateProductSize($request->sizes, $this->product->id);
        if ($request->other_images){
            ProductImage::updateProductImage($request->other_images, $this->product->id);
        }


        return redirect('/vendor-product')->with('message','Product info update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::deleteProduct(Product::find($id));
        ProductImage::deleteProductImages($id);
        ProductColor::deleteProductColor($id);
        ProductSize::deleteProductSize($id);
        return back()->with('message', 'Delete Product Successfully');
    }
}
