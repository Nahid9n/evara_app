<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /*
    public static $category,$image,$imageNewName,$dir,$imgUrl;
    public static function saveInfo($request ,$id=null){
        if ($id != null){
            self::$category =Category::find($id);
        }else{
            self::$category = new  Category();
        }

        self::$category->name = $request->name;
        self::$category->description = $request->description;


        if ($request->file('image')){
            if(self::$category->image){
                if (file_exists(self::$category->image)){
                    unlink(self::$category->image);
                }
            }
            self::$category->image = self::saveImage($request);
        }

        self::$category->save();

    }

    private static function saveImage($request){
        self::$image =$request->file('image');
        self::$imageNewName =$request->title.rand().'.'.self::$image->extension();
        self::$dir = 'admin/img/category-img/';
        self::$imgUrl =  self::$dir.self::$imageNewName;
        self::$image->move(self::$dir,self::$imageNewName);
        return self::$imgUrl;

    }

    public static function checkStatus($id)
    {
        self::$category= self::find($id);
        if (self::$category->status == 1){
            self::$category->status = 0;
        }
        else{
            self::$category->status = 1;
        }
        self::$category->save();

    }

    */


    /*
    private static $category, $image, $imageName,$directory, $imageUrl;

//
//    private static function getImageUrl($request)
//    {
//        self::$image        =$request->file('image');
//        self::$imageName        =self::$image->getclientOriginalName();
//        self::$directory = "admin/img/category-images/";
//        self::$image->move(self::$directory, self::$imageName);
//        self::$imageUrl = self::$directory.self::$imageName;
//
//        return self::$imageUrl;
//    }

    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = "upload/category-images/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name       = $request->name;
        self::$category->description = $request->description;
        self::$category->image      = self::getImageUrl($request);
        self::$category->status     = $request->status;
        self::$category->save();
    }

    */

    private static $category, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {

        self::$image        = $request->file('image');
        self::$imageName    = rand(1,100).self::$image->getClientOriginalName();
        self::$directory    = "admin/img/category-img/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newCategory($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : ' ';

        self::$category = new Category();
        self::saveBasicInfo(self::$category, $request, self::$imageUrl);
    }

    public static function checkStatus($category)
    {
        self::$category= self::find($category->id);
        if (self::$category->status == 1){
            self::$category->status = 0;
        }
        else{
            self::$category->status = 1;
        }
        self::$category->save();

    }
    public static function updateCategory($request, $category)
    {
        if ($request->file('image'))
        {
            if (file_exists($category->image))
            {
                unlink($category->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $category->image;
        }
        self::saveBasicInfo($category, $request, self::$imageUrl);
    }

    private static function saveBasicInfo($category, $request, $imageUrl)
    {
        $category->name           = $request->name;
        $category->description    = $request->description;
        $category->image          = $imageUrl;
        $category->status         = $request->status;
        $category->save();
    }

    public function  subCategory(){
        return $this->hasMany(SubCategory::class);
    }



}
