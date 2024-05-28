<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;


    private static $size;

    public static function newSize($request)
    {
        self::$size = new Size();
        self::saveBasicInfo(self::$size, $request);
    }

    public static function checkStatus($size)
    {
        self::$size= self::find($size->id);
        if (self::$size->status == 1){
            self::$size->status = 0;
        }
        else{
            self::$size->status = 1;
        }
        self::$size->save();

    }
    public static function updateSize($request, $size)
    {
        self::saveBasicInfo($size, $request);
    }

    private static function saveBasicInfo($size, $request)
    {
        $size->name           = $request->name;
        $size->code           = $request->code;
        $size->description    = $request->description;

        $size->status         = $request->status;
        $size->save();
    }

    public static  function deleteSize($size){

        $size->delete();
    }
}
