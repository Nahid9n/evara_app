<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    /*
    private static $subCategory, $image, $imageName,$directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = "upload/sub-category-images/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubCategory($request)
    {
//        if($request->file('image')){
//            self::$imageUrl =self::getImageUrl($request);
//        }
//        else{
//            self::$imageUrl =' ';
//        }

        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : ' ';

        self::$subCategory = new SubCategory();
        self::$subCategory->category_id       = $request->category_id;
        self::$subCategory->name       = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->image      =  self::$imageUrl;
        self::$subCategory->status     = $request->status;
        self::$subCategory->save();
    }
    */

    private static $subCategory, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = rand(1,10000).self::$image->getClientOriginalName();
        self::$directory    = "admin/img/sub-category-img/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newSubCategory($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : ' ';

        self::$subCategory = new SubCategory();
        self::saveBasicInfo(self::$subCategory, $request, self::$imageUrl);
    }

    public static function checkStatus($subCategory)
    {
        self::$subCategory= self::find($subCategory->id);
        if (self::$subCategory->status == 1){
            self::$subCategory->status = 0;
        }
        else{
            self::$subCategory->status = 1;
        }
        self::$subCategory->save();

    }

    public static function updateSubCategory($request, $subCategory)
    {
        if ($request->file('image'))
        {
            if (file_exists($subCategory->image))
            {
                unlink($subCategory->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $subCategory->image;
        }
        self::saveBasicInfo($subCategory, $request, self::$imageUrl);
    }

    private static function saveBasicInfo($subCategory, $request, $imageUrl)
    {
        $subCategory->category_id    = $request->category_id;
        $subCategory->name           = $request->name;
        $subCategory->description    = $request->description;
        $subCategory->image          = $imageUrl;
        $subCategory->status         = $request->status;
        $subCategory->save();
    }

    /*
    public static  function deleteSubCategory($subCategory){

        if (file_exists($subCategory->image)) {
            unlink($subCategory->image);
        }
        $subCategory->delete();
    }
    */

    public function category(){
        return $this->belongsTo(Category::class);
        // return $this->hasOne(Category::class);  Both category and sub-category are in one-to-one relationship
        //
    }

}
