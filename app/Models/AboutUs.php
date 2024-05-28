<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    private static $aboutUs;

    private static function saveBasicInfo($aboutUs, $request)
    {
        $aboutUs->description    = $request->description;
        $aboutUs->status         = $request->status;
        $aboutUs->save();
    }

    public static function newAboutUs($request)
    {
        self::$aboutUs = new AboutUs();
        self::saveBasicInfo(self::$aboutUs, $request);
    }


    public static function updateAboutUs($request, $aboutUs)
    {
        self::saveBasicInfo($aboutUs, $request);
    }
}
