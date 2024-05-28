<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnPolicy extends Model
{
    use HasFactory;

    private static $returnPolicy;

    private static function saveBasicInfo($returnPolicy, $request)
    {
        $returnPolicy->description    = $request->description;
        $returnPolicy->status         = $request->status;
        $returnPolicy->save();
    }

    public static function newReturnPolicy($request)
    {
        self::$returnPolicy = new ReturnPolicy();
        self::saveBasicInfo(self::$returnPolicy, $request);
    }


    public static function updateReturnPolicy($request, $returnPolicy)
    {
        self::saveBasicInfo($returnPolicy, $request);
    }
}
