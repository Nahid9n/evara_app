<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Highlight;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductHighlight;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductTag;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\Tag;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            'products' => Product::latest()->simplePaginate(100),
        ]);
    }
    public function create()
    {
        return view('admin.product.add',[
            'categories' => Category::orderBy('name','asc')->get(),
            'sub_categories' => SubCategory::orderBy('name','asc')->get(),
            'brands'=>Brand::orderBy('name','asc')->get(),
            'units' => Unit::orderBy('name','asc')->get(),
            'colors' => Color::orderBy('name','asc')->get(),
            'sizes' => Size::orderBy('name','asc')->get(),
            'highlights' => Highlight::orderBy('name','asc')->get(),
            'tags' => Tag::orderBy('name','asc')->get(),
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
    public function store(Request $request)
    {
//        return $request;
//        try {
            $this->validate($request,[
                'name' => 'required',
            ]);

            $this->product = Product::newProduct($request);
            if ($request->highlights){
                ProductHighlight::newProductHighlight($request->highlights , $this->product->id);
            }
            if ($request->colors){
                ProductColor::newProductColor($request->colors , $this->product->id);
            }
            if ($request->sizes){
                ProductSize::newProductSize($request->sizes, $this->product->id);
            }
            if ($request->tags){
                ProductTag::newProductTag($request->tags, $this->product->id);
            }

            return back()->with('message','Product info save successfully');
        /*}
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }*/
    }
    public function show(Product $product)
    {
        $image = array(
            ['image' => $product->image],
            ['image' => $product->back_image]
        );
        $as  = $product->productImages->toArray();
        $productImages = array_merge($as,$image);
        return view('admin.product.details', [
            'product' => $product,
            'productImages' => $productImages,

        ]);
    }
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product,
            'categories' => Category::orderBy('name','asc')->get(),
            'sub_categories' => SubCategory::orderBy('name','asc')->get(),
            'brands'=>Brand::orderBy('name','asc')->get(),
            'units' => Unit::orderBy('name','asc')->get(),
            'colors' => Color::orderBy('name','asc')->get(),
            'sizes' => Size::orderBy('name','asc')->get(),
            'highlights' => Highlight::orderBy('name','asc')->get(),
            'tags' => Tag::orderBy('name','asc')->get(),
        ]);
    }
    public function update(Request $request, Product $product)
    {

        try {
            Product::updateProduct($request,$product);

            if ($request->highlights){
                ProductHighlight::updateProductHighlight($request->highlights,$product->id);
            }
            if ($request->colors){
                ProductColor::updateProductColor($request->colors,$product->id);
            }
            if ($request->sizes){
                ProductSize::updateProductSize($request->sizes,$product->id);
            }
            if ($request->tags){
                ProductTag::updateProductTag($request->tags, $product->id);
            }
            ProductTag::updateProductTag($request->tags, $product->id);
            return back()->with('message','Product info update successfully.');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy(Product $product)
    {
        Product::deleteProduct($product);
        return back()->with('message', 'Delete Product Successfully');
    }
    public function otherImagesStore(Request $request){
        try {
             $validate = Validator::make($request->all(),[
                  "product_id"         => "required",
                  "image"         => "required",
             ]);

             if($validate->fails()){
                   return back()->with('error',$validate->messages());
             }
             $other = new ProductImage();
             /* Image */
             $image        = $request->file('image');
             $imageName    = rand(1,100).$image->getClientOriginalName();
             $directory    = "admin/img/category-img/";
             $image->move($directory, $imageName);
             $imageUrl     = $directory.$imageName;

             $other->image = $imageUrl;
             $other->product_id = $request->product_id;
             $other->alt_text = $request->alt_text;
             $other->save();
             return back()->with('message','Create Success.');
        }
        catch (Exception $e){
             return back()->with('error',$e->getMessage());
        }
    }
    public function otherImagesUpdate(Request $request,$id){
        try {
             $validate = Validator::make($request->all(),[
                  "product_id"         => "required",
             ]);

             if($validate->fails()){
                   return back()->with('error',$validate->messages());
             }
             $other = ProductImage::find($id);
             /* Image */
            if ($request->file('image')){
                if (isset($other->image)){
                    unlink($other->image);
                }
                $image        = $request->file('image');
                $imageName    = rand(1,100).$image->getClientOriginalName();
                $directory    = "admin/img/category-img/";
                $image->move($directory, $imageName);
                $imageUrl     = $directory.$imageName;
                $other->image = $imageUrl;
            }
            else{
                $other->image = $other->image;
            }
            $other->product_id = $request->product_id;
            $other->alt_text = $request->alt_text;
            $other->save();
            return back()->with('message','Update Success.');
        }
        catch (Exception $e){
             return back()->with('error',$e->getMessage());
        }
    }
    public function otherImagesDestroy($id)
    {
        $other = ProductImage::find($id);
        if (isset($other->image)){
            unlink($other->image);
        }
        $other->delete();
        return back()->with('message', 'Delete Successfully');
    }
}
