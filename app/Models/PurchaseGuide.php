<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseGuide extends Model
{
    use HasFactory;

    private static $purchaseGuide;

    private static function saveBasicInfo($purchaseGuide, $request)
    {
        $purchaseGuide->description    = $request->description;
        $purchaseGuide->status         = $request->status;
        $purchaseGuide->save();
    }

    public static function newPurchaseGuide($request)
    {
        self::$purchaseGuide = new PurchaseGuide();
        self::saveBasicInfo(self::$purchaseGuide, $request);
    }


    public static function updatePurchaseGuide($request, $purchaseGuide)
    {
        self::saveBasicInfo($purchaseGuide, $request);
    }
}
