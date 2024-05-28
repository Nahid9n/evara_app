<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    private static $feature, $image, $imageName, $extension, $directory, $imageUrl;

    private static function getImageUrl($request)
    {
        self::$image        = $request->file('image');
        self::$extension    = self::$image->getClientOriginalExtension();
        self::$imageName    = time().'.'.self::$extension;
        self::$directory    = 'admin/img/feature-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newFeature($request)
    {
        if ($request->file('image'))
        {
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = 'admin/img/product.png';
        }
        self::$feature                      = new Feature();

        self::$feature->name                = $request->name;
        self::$feature->image               = self::$imageUrl;
        self::$feature->status              = $request->status;
        self::$feature->save();
        return self::$feature;
    }




    public static function updateFeature($request, $feature)
    {
        if ($request->file('image'))
        {
            if (file_exists($feature->image))
            {
                unlink($feature->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = $feature->image;
        }

        $feature->name                = $request->name;
        $feature->image               = self::$imageUrl;
        $feature->status              = $request->status;
        $feature->save();
    }

    public static function deleteFeature($feature)
    {
        if(file_exists($feature->image)){
            unlink($feature->image);
        }
        $feature->delete();
    }
}
