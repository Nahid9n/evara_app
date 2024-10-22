<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponCollect;
use Illuminate\Http\Request;

class CouponManageController extends Controller
{
    public function customerCoupons(){
        $coupons = CouponCollect::where('user_id',auth()->user()->id)->latest()->get();
        return view('customer.coupon.index',compact('coupons'));
    }
    public function customerCouponView($code){
        $coupon = Coupon::where('coupon_code',$code)->first();
        return view('customer.coupon.view',compact('coupon'));
    }
    public function collect(Request $request){
        try {
            $this->validate($request,[
                'coupon_id' =>' required',
                'user_id' =>' required',
            ]);
            $coupon = Coupon::find($request->coupon_id);
            $date = explode(' ',$coupon->date_range);
            $couponCollect = new CouponCollect();
            $couponCollect->coupon_id = $request->coupon_id;
            $couponCollect->user_id = $request->user_id;
            $couponCollect->date_expire = $date[2];
            $couponCollect->save();
            toastr()->success('Coupon Collect Success.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }



    }
}
