<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    private static $setting, $imageUrl;

    public static function newSetting( $request )
    {
        self::$setting = new Setting();

        self::$setting->company_name        = $request->company_name;
        self::$setting->slogan              = $request->slogan;
        self::$setting->title               = $request->title;
        self::$setting->contact_phone       = $request->contact_phone;
        self::$setting->support_phone       = $request->support_phone;
        self::$setting->contact_email       = $request->contact_email;
        self::$setting->support_email       = $request->support_email;
        self::$setting->office_hour         = $request->office_hour;
        self::$setting->facebook_link       = $request->facebook_link;
        self::$setting->twitter_link        = $request->twitter_link;
        self::$setting->linkedin_link       = $request->linkedin_link;
        self::$setting->youtube_link        = $request->youtube_link;
        self::$setting->instagram_link      = $request->instagram_link;
        self::$setting->google_map_api_link = $request->google_map_api_link;
        self::$setting->android_app_url     = $request->android_app_url;
        self::$setting->ios_app_url         = $request->ios_app_url;
        self::$setting->company_address     = $request->company_address;

        if ($request->file('android_app_image')) {
            self::$setting->android_app_image = imageUpload($request->file('android_app_image'),'admin/img/setting/');
        }

        else{
            self::$setting->android_app_image = 'admin/img/product.png';
        }
        if ($request->file('ios_app_image')) {
            self::$setting->ios_app_image = imageUpload($request->file('ios_app_image'),'admin/img/setting/');
        }
        else{
            self::$setting->ios_app_image = 'admin/img/product.png';
        }

        if ($request->file('logo_jpg')) {
            self::$setting->logo_jpg = imageUpload($request->file('logo_jpg'),'admin/img/setting/');
        }
        else{
            self::$setting->logo_jpg = 'admin/img/product.png';
        }
        if ($request->file('logo_png')) {
            self::$setting->logo_png = imageUpload($request->file('logo_png'),'admin/img/setting/');
        }
        else{
            self::$setting->logo_png = 'admin/img/product.png';
        }

        if ($request->file('payment_method_image')) {
            self::$setting->payment_method_image = imageUpload($request->file('payment_method_image'),'admin/img/setting/');
        }
        else{
            self::$setting->payment_method_image = 'admin/img/product.png';
        }

        if ($request->file('favicon')) {
            self::$setting->favicon = imageUpload($request->file('favicon'),'admin/img/setting/');
        }
        else{
            self::$setting->favicon = 'admin/img/product.png';
        }

        self::$setting->save();
    }


    public static function updateSetting($request, $setting)
    {
        $setting->company_name        = $request->company_name;
        $setting->slogan              = $request->slogan;
        $setting->title               = $request->title;
        $setting->contact_phone       = $request->contact_phone;
        $setting->support_phone       = $request->support_phone;
        $setting->contact_email       = $request->contact_email;
        $setting->support_email       = $request->support_email;
        $setting->office_hour         = $request->office_hour;
        $setting->facebook_link       = $request->facebook_link;
        $setting->twitter_link        = $request->twitter_link;
        $setting->linkedin_link       = $request->linkedin_link;
        $setting->youtube_link        = $request->youtube_link;
        $setting->instagram_link      = $request->instagram_link;
        $setting->google_map_api_link = $request->google_map_api_link;
        $setting->android_app_url     = $request->android_app_url;
        $setting->ios_app_url         = $request->ios_app_url;
        $setting->company_address     = $request->company_address;

        if ($request->file('android_app_image')) {
            $setting->android_app_image = imageUpload($request->file('android_app_image'),'admin/img/setting/');
        }

        if($request->file('ios_app_image')) {
            $setting->ios_app_image = imageUpload($request->file('ios_app_image'),'admin/img/setting/');
        }

        if ($request->file('logo_jpg')) {
            $setting->logo_jpg = imageUpload($request->file('logo_jpg'),'admin/img/setting/');
        }

        if ($request->file('logo_png')) {
            $setting->logo_png = imageUpload($request->file('logo_png'),'admin/img/setting/');
        }

        if ($request->file('payment_method_image')) {
            $setting->payment_method_image = imageUpload($request->file('payment_method_image'),'admin/img/setting/');
        }

        if ($request->file('favicon')) {
            $setting->favicon = imageUpload($request->file('favicon'),'admin/img/setting/');
        }

        $setting->save();
    }
}
