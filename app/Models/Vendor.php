<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    private static $vendor, $image, $directory, $imageName, $extension, $imageUrl;



    public static function newVendor($request)
    {
        self::$vendor = new Vendor();
        self::$vendor->name     = $request->name;
        self::$vendor->email    = $request->email;
        self::$vendor->mobile   = $request->mobile;
        if ($request->password){
            self::$vendor->password = bcrypt($request->password);
        }
        else{
            self::$vendor->password = bcrypt($request->mobile);
        }

        self::$vendor->save();
        return self::$vendor;
    }

    public static function updateVendor($request)
    {
        self::$vendor = Vendor::find($request->id);
        self::$vendor->name     = $request->name;
        self::$vendor->email    = $request->email;
        self::$vendor->mobile   = $request->mobile;
        if ($request->password){
            self::$vendor->password = bcrypt($request->password);
        }
        else{
            self::$vendor->password = bcrypt($request->mobile);
        }
        self::$vendor->address = $request->address;
        self::$vendor->date_of_birth = $request->date_of_birth;
        self::$vendor->blood_group = $request->blood_group;
        self::$vendor->nid = $request->nid;
        self::$vendor->district = $request->district;
        if ($request->file('image')) {
            if (file_exists(self::$vendor->image)) {
                unlink(self::$vendor->image);
            }
            self::$vendor->image = imageUpload($request->file('image'),'admin/img/vendor/');
        }

        self::$vendor->save();
        return self::$vendor;
    }

}
