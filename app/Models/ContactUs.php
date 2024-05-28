<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    private static $contactUs;

    private static function saveBasicInfo($contactUs, $request)
    {
        $contactUs->description    = $request->description;
        $contactUs->status         = $request->status;
        $contactUs->save();
    }

    public static function newContactUs($request)
    {
        self::$contactUs = new ContactUs();
        self::saveBasicInfo(self::$contactUs, $request);
    }


    public static function updateContactUs($request, $contactUs)
    {
        self::saveBasicInfo($contactUs, $request);
    }
}
