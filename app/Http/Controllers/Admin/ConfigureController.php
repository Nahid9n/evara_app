<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigureController extends Controller
{
    public function index(){
        $setting = Setting::latest()->first();
        $aboutUs = AboutUs::latest()->first();
        $contactUs = ContactUs::latest()->first();
        return view('admin.configure.index',compact('setting','aboutUs','contactUs'));
    }
}
