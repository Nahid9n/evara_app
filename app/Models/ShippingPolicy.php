<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPolicy extends Model
{
    use HasFactory;

    private static $shippingPolicy;

    private static function saveBasicInfo($shippingPolicy, $request)
    {
        $shippingPolicy->description    = $request->description;
        $shippingPolicy->status         = $request->status;
        $shippingPolicy->save();
    }

    public static function newShippingPolicy($request)
    {
        self::$shippingPolicy = new ShippingPolicy();
        self::saveBasicInfo(self::$shippingPolicy, $request);
    }


    public static function updateShippingPolicy($request, $shippingPolicy)
    {
        self::saveBasicInfo($shippingPolicy, $request);
    }
}
