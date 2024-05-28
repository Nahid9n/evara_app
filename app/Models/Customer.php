<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    private static $customer, $image, $directory, $imageName, $extension, $imageUrl;

    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->mobile = $request->mobile;
        if ($request->password){
            self::$customer->password = bcrypt($request->password);
        }
        else{
            self::$customer->password = bcrypt($request->mobile);
        }

        self::$customer->save();

        return self::$customer;
    }

    public static function updateCustomer($request)
    {
        self::$customer= Customer::find($request->id);
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->mobile = $request->mobile;
        if ($request->password) {
            self::$customer->password = bcrypt($request->password);
        } else {
            self::$customer->password = bcrypt($request->mobile);
        }
        self::$customer->address = $request->address;
        self::$customer->date_of_birth = date('m/d/Y',strtotime($request->date_of_birth));
        self::$customer->blood_group = $request->blood_group;
        self::$customer->district = $request->district;

        /*
         if($request->file('image')) {
            self::$customer->image = imageUpload($request->file('image'),'admin/img/customer/');
        }
        */
        if ($request->file('image')) {
            if (file_exists(self::$customer->image)) {
                unlink(self::$customer->image);
            }
            self::$customer->image = imageUpload($request->file('image'),'admin/img/customer/');
        }
        self::$customer->save();
        return self::$customer;

    }

}
