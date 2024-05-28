<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    /*
    public static $brand,$image,$imageNewName,$dir,$imgUrl;
    public static function saveInfo($request ,$id=null){
        if ($id != null){
            self::$brand =Brand::find($id);
        }else{
            self::$brand = new  Brand();
        }

        self::$brand->name = $request->name;
        self::$brand->description = $request->description;


        if ($request->file('image')){
            if(self::$brand->image){
                if (file_exists(self::$brand->image)){
                    unlink(self::$brand->image);
                }
            }
            self::$brand->image = self::saveImage($request);
        }

        self::$brand->save();

    }

    private static function saveImage($request){
        self::$image =$request->file('image');
        self::$imageNewName =$request->title.rand().'.'.self::$image->extension();
        self::$dir = 'admin/img/brand-img/';
        self::$imgUrl =  self::$dir.self::$imageNewName;
        self::$image->move(self::$dir,self::$imageNewName);
        return self::$imgUrl;

    }

    public static function checkStatus($id)
    {
        self::$brand= self::find($id);
        if (self::$brand->status == 1){
            self::$brand->status = 0;
        }
        else{
            self::$brand->status = 1;
        }
        self::$brand->save();

    }
    */

    private static $brand, $image, $imageName, $directory, $imageUrl;

    private static function getImageUrl($request)
    {

        self::$image        = $request->file('image');
        self::$imageName    =  rand(1,10000).self::$image->getClientOriginalName();
        self::$directory    = "admin/img/brand-img/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newBrand($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : ' ';

        self::$brand = new Brand();
        self::saveBasicInfo(self::$brand, $request, self::$imageUrl);
    }

    public static function checkStatus($brand)
    {
        self::$brand= self::find($brand->id);
        if (self::$brand->status == 1){
            self::$brand->status = 0;
        }
        else{
            self::$brand->status = 1;
        }
        self::$brand->save();

    }
    public static function updateBrand($request, $brand)
    {
        if ($request->file('image'))
        {
            if (file_exists($brand->image))
            {
                unlink($brand->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $brand->image;
        }
        self::saveBasicInfo($brand, $request, self::$imageUrl);
    }

    private static function saveBasicInfo($brand, $request, $imageUrl)
    {
        $brand->name           = $request->name;
        $brand->description    = $request->description;
        $brand->image          = $imageUrl;
        $brand->status         = $request->status;
        $brand->save();
    }



}
