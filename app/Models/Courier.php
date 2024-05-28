<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    private static $courier;

    public static function newCourier($request)
    {
        self::$courier = new Courier();
        self::saveBasicInfo(self::$courier, $request);
    }


    public static function updateCourier($request, $courier)
    {
        self::saveBasicInfo($courier, $request);
    }

    private static function saveBasicInfo($courier, $request)
    {
        $courier->name           = $request->name;
        $courier->email           = $request->email;
        $courier->mobile    = $request->mobile;
        $courier->address    = $request->address;
        $courier->shipping_cost    = $request->shipping_cost;
        $courier->status         = $request->status;
        $courier->save();
    }

    public static  function deleteCourier($courier){

        $courier->delete();
    }
}
