<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    private static $product,$slug, $image,$backImage,$imageName,$extension, $directory,$imageUrl,$backImageName,$backImageUrl;


    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = "admin/img/product-img/";
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory . self::$imageName;
    }
    private static function getBackImageUrl($request)
    {
        self::$backImage = $request->file('back_image');
        self::$backImageName = self::$backImage->getClientOriginalName();
        self::$directory = "admin/img/product-img/";
        self::$backImage->move(self::$directory, self::$backImageName);
        return self::$directory . self::$backImageName;
    }

    public static function newProduct($request, $vendorId = 0)
    {
        self::$product = new Product();

        self::$product->category_id = $request->category_id;
        self::$product->sub_category_id = $request->sub_category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->unit_id = $request->unit_id;
        self::$product->name = $request->name;
//        slug
        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
//end slug
        self::$product->slug  = $slug;
        self::$product->code = $request->code;
        self::$product->short_description = $request->short_description;
        self::$product->long_description = $request->long_description;
        if ($request->image) {
            self::$product->image = self::getImageUrl($request);
        }
        if ($request->back_image) {
            self::$product->back_image = self::getBackImageUrl($request);
        }
        self::$product->video_link = $request->video_link;
        self::$product->regular_price = $request->regular_price;
        self::$product->selling_price = $request->selling_price;
        self::$product->app_selling_price = $request->app_selling_price;
        self::$product->stock_amount = $request->stock_amount;
        self::$product->alert_qty = $request->alert_qty;
        self::$product->max_order_qty = $request->max_order_qty;
        self::$product->weight = $request->weight;
        self::$product->mrp = $request->mrp;
        self::$product->vat = $request->vat;
        self::$product->free_delivery = $request->free_delivery;
        self::$product->vat_applicable = $request->vat_applicable;
        self::$product->stock_visibility = $request->stock_visibility;
        self::$product->discount_type = $request->discount_type;
        self::$product->discount_value = $request->discount_value;
        self::$product->discount_banner = $request->discount_banner;
        self::$product->video_link = $request->video_link;
        self::$product->refund = $request->refund;
        self::$product->meta_title = $request->meta_title;
        self::$product->meta_description = $request->meta_description;
        self::$product->meta_keyword = $request->meta_keyword;
        self::$product->meta_author = $request->meta_author;
        self::$product->alt_text = $request->alt_text;
        self::$product->schema_text = $request->schema_text;
        self::$product->featured_status = $request->featured_status;
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
    public static function updateProduct( $request, $product )
    {
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->unit_id = $request->unit_id;
        if ($product->name == $request->name){
            $product->slug  = $product->slug;
        }
        else{
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $counter = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $product->slug  = $slug;
        }
        $product->name = $request->name;
        $product->code = $request->code;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
//        $product->long_description = strip_tags($request->long_description);

        if ($request->file('image')) {
            if (file_exists($product->image)) {
                unlink($product->image);
            }
            $product->image = self::getImageUrl($request);
        }
        if ($request->file('back_image')) {
            if (file_exists($product->back_image)) {
                unlink($product->back_image);
            }
            $product->back_image = self::getBackImageUrl($request);;
        }
        $product->video_link = $request->video_link;
        $product->regular_price = $request->regular_price;
        $product->selling_price = $request->selling_price;
        $product->app_selling_price = $request->app_selling_price;
        $product->stock_amount = $request->stock_amount;
        $product->alert_qty = $request->alert_qty;
        $product->max_order_qty = $request->max_order_qty;
        $product->weight = $request->weight;
        $product->mrp = $request->mrp;
        $product->vat = $request->vat;
        $product->free_delivery = $request->free_delivery;
        $product->vat_applicable = $request->vat_applicable;
        $product->stock_visibility = $request->stock_visibility;
        $product->discount_type = $request->discount_type;
        $product->discount_value = $request->discount_value;
        $product->discount_banner = $request->discount_banner;
        $product->video_link = $request->video_link;
        $product->tags = $request->tags;
        $product->refund = $request->refund;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;
        $product->meta_author = $request->meta_author;
        $product->alt_text = $request->alt_text;
        $product->schema_text = $request->schema_text;
        $product->featured_status = $request->featured_status;
        if ($request->status)
        {
            $product->status = $request->status;
        }
        $product->save();
    }
    public static  function deleteProduct($product){

        if (file_exists($product->image)) {
            unlink($product->image);
        }
        if (file_exists($product->back_image)) {
            unlink($product->back_image);
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
    public function tagss()
    {
        return $this->hasMany(ProductTag::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }
}
