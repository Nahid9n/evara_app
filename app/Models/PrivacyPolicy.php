<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;
    private static $privacyPolicy;

    private static function saveBasicInfo($privacyPolicy, $request)
    {
        $privacyPolicy->description    = $request->description;
        $privacyPolicy->status         = $request->status;
        $privacyPolicy->save();
    }

    public static function newPrivacyPolicy($request)
    {
        self::$privacyPolicy = new PrivacyPolicy();
        self::saveBasicInfo(self::$privacyPolicy, $request);
    }


    public static function updatePrivacyPolicy($request, $privacyPolicy)
    {
        self::saveBasicInfo($privacyPolicy, $request);
    }
}
