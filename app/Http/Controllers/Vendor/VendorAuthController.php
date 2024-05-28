<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Vendor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class VendorAuthController extends Controller
{
    private $vendor;

    public function index()
    {
        return view('website.vendor.auth');
    }

    public function login(Request $request)
    {
        $this->vendor = Vendor::where('email',$request->user_name)->orWhere('mobile',$request->user_name)->first();

        if ( $this->vendor){
            if (password_verify( $request->password , $this->vendor->password)){
//                return 'success';

                Session::put('vendor_id', $this->vendor->id);
                Session::put('vendor_name', $this->vendor->name);

                return redirect('/vendor-dashboard');
            }
            else{
                return back()->with('message','Your password is not valid ');
            }
        }
        else{

            return back()->with('message','Your email or Mobile number is not valid ');
        }
    }

    public function register(Request $request)
    {
        $this->vendor = Vendor::newVendor($request);

        Session::put('vendor_id', $this->vendor->id);
        Session::put('vendor_name', $this->vendor->name);

        return redirect('/vendor-dashboard');
    }




    public function dashboard()
    {
        $this->vendor = Vendor::where('id', Session::get('vendor_id'))
            ->first();
        return view('admin.vendor.dashboard',[
            'vendor' => $this->vendor,
        ]);
//        return view('website.vendor.dashboard');
    }


    public function logout()
    {
        Session::forget('vendor_id');
        Session::forget('vendor_name');

        return redirect('/');
    }
}
