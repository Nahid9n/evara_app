<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    private static $ad,  $imageUrl;



    public static function newAd($request)
    {
        if ($request->file('image'))
        {
            self::$imageUrl = imageUpload($request->file('image'),'admin/img/ad-images/');
        }
        else
        {
            self::$imageUrl = 'admin/img/product.png';
        }
        self::$ad = new ad();
        self::saveBasicInfo($request,self::$ad,self::$imageUrl);

       // return self::$ad;
    }




    public static function updateAd($request, $ad)
    {
        if ($request->file('image'))
        {
            if (file_exists($ad->image))
            {
                unlink($ad->image);
            }
            self::$imageUrl = imageUpload($request->file('image'),'admin/img/ad-images/');;
        }
        else
        {
            self::$imageUrl = $ad->image;
        }
        self::saveBasicInfo($request,$ad,self::$imageUrl);

    }

    private static function saveBasicInfo($request,$ad,$imageUrl){
        $ad->product_id                   = $request->product_id;
        $ad->title                        = $request->title;
        $ad->sub_title                     = $request->sub_title;
        $ad->position                     = $request->position;
        if($request->offer_price){
            $ad->offer_price                  = $request->offer_price;
        }
        $ad->offer_price                  = 0;
        if($request->discount){
            $ad->discount                  = $request->discount;
        }
        $ad->discount                     = 0;
        $ad->image                        = $imageUrl;
        $ad->status                       = $request->status;
        $ad->save();
    }

    public static function deleteAd($ad)
    {
        if(file_exists($ad->image)){
            unlink($ad->image);
        }
        $ad->delete();
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
