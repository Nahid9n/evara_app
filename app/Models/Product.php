<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product, $image,$imageName,$extension, $directory,$imageUrl;


    private static function getImageUrl($request)
    {

        self::$image = $request->file('image');
        self::$extension = self::$image->getClientOriginalExtension();
        self::$imageName = time() . '.' . self::$extension;
        self::$directory = "admin/img/product-img/";
        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$directory . self::$imageName;
    }

    public static function newProduct($request, $vendorId = 0)
    {
        if ($request->file('image')) {
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = 'admin/img/product.png';
        }

        self::$product = new Product();

        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
        self::$product->code = $request->code;

        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
//        self::$product->long_description = strip_tags($request->long_description);
        self::$product->image = self::$imageUrl;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->stock_amount = $request->stock_amount;
        if ($request->status)
        {
            self::$product->status = $request->status;
        }
        else
        {
            self::$product->status = 0;
        }
        self::$product->vendor_id = $vendorId;
        self::$product->save();

        return self::$product;
    }

    public static  function deleteProduct($product){

        if (file_exists($product->image)) {
            unlink($product->image);
        }
        $product->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public static function updateProduct( $request, $product )
    {
        if ($request->file('image')) {
            if (file_exists($product->image)) {
                unlink($product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else {
            self::$imageUrl = $product->image;
        }

        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->unit_id = $request->unit_id;
        $product->name = $request->name;
        $product->code = $request->code;

        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
//        $product->long_description = strip_tags($request->long_description);
        $product->image = self::$imageUrl;
        $product->regular_price = $request->regular_price;
        $product->selling_price = $request->selling_price;
        $product->stock_amount = $request->stock_amount;
        if ($request->status)
        {
            $product->status = $request->status;
        }
        $product->save();
    }

}
