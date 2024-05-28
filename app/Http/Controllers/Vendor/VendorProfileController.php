<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Session;
class VendorProfileController extends Controller
{
    private $vendor;
    public function index()
    {
        $this->vendor = Vendor::where('id', Session::get('vendor_id'))
            ->first();
        return view('admin.vendor.profile',[
            'vendor' => $this->vendor,
        ]);
    }

    public function editVendorProfile(Request $request)
    {
        $this->vendor = Vendor::updateVendor($request);
        Session::put('vendor_id', $this->vendor->id);
        Session::put('vendor_name', $this->vendor->name);

        return redirect('/vendor-profile')->with('message','Vendor Profile Updated');
    }

    public function update(Request $request)
    {
        return $request;
    }
}
