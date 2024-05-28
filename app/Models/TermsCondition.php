<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    use HasFactory;

    private static $termsCondition;

    private static function saveBasicInfo($termsCondition, $request)
    {
        $termsCondition->description    = $request->description;
        $termsCondition->status         = $request->status;
        $termsCondition->save();
    }

    public static function newTermsCondition($request)
    {
        self::$termsCondition = new TermsCondition();
        self::saveBasicInfo(self::$termsCondition, $request);
    }


    public static function updateTermsCondition($request, $termsCondition)
    {
        self::saveBasicInfo($termsCondition, $request);
    }
}
