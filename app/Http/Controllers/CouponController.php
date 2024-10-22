<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function adminIndex()
    {
        $coupons = Coupon::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
        return view('admin.marketing.coupon.index',compact('coupons'));

    }
    public function adminCreate()
    {
        $products = Product::select('name','id')->get();
        return view('admin.marketing.coupon.add',compact('products'));
    }
    public function ProductStore(Request $request)
    {
        try{
            $validate = Validator::make($request->all(), [
                'coupon_code'        => 'required|string:255|unique:coupons,coupon_code,except,id',
                'product_id'        => 'required',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }

            $coupon = new Coupon();
            $coupon->coupon_type = $request->coupon_type;
            $coupon->coupon_code = $request->coupon_code;
            $coupon->product_id = $request->product_id;
            $coupon->user_id = auth()->user()->id;
            $coupon->discount = $request->discount;
            $coupon->discount_status = $request->discount_status;
            $coupon->date_range = $request->datefilter;
            $coupon->status = $request->status;
            $coupon->save();

            Toastr::success('Successfully Added.');
            return redirect()->route('admin-coupon.index');
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function OrderStore(Request $request)
    {
        try{
            $validate = Validator::make($request->all(), [
                'coupon_code' => 'required|string:255|unique:coupons,coupon_code,except,id',
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $coupon = new Coupon();
            $coupon->coupon_type = $request->coupon_type;
            $coupon->coupon_code = $request->coupon_code;
            $coupon->min_shopping = $request->min_shopping;
            $coupon->user_id = auth()->user()->id;
            $coupon->discount = $request->discount;
            $coupon->discount_status = $request->discount_status;
            $coupon->max_discount_amount = $request->max_discount_amount;
            $coupon->date_range = $request->datefilter;
            $coupon->status = $request->status;
            $coupon->save();

            Toastr::success('Successfully Added.');
            return redirect()->route('admin-coupon.index');
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function adminEdit($id)
    {
        $coupon = Coupon::find($id);
        $products = Product::select('name','id')->get();
        return view('admin.marketing.coupon.edit',compact('products',"coupon"));
    }
    public function adminProductUpdate(Request $request,$id)
    {
        try{
            $validate = Validator::make($request->all(), [
                'coupon_code'        => 'required|string:255|unique:coupons,coupon_code,'.$id,
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $coupon = Coupon::find($id);
            $coupon->coupon_type = $request->coupon_type;
            $coupon->coupon_code = $request->coupon_code;
            $coupon->product_id = $request->product_id;
            $coupon->user_id = auth()->user()->id;
            $coupon->discount = $request->discount;
            $coupon->discount_status = $request->discount_status;
            $coupon->date_range = $request->datefilter;
            $coupon->status = $request->status;
            $coupon->save();
            Toastr::success('Successfully Updated.');
            return redirect()->route('admin-coupon.index');
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function adminOrderUpdate(Request $request,$id)
    {
        try{
            $validate = Validator::make($request->all(), [
                'coupon_code'        => 'required|string:255|unique:coupons,coupon_code,'.$id,
            ]);
            if ($validate->fails()) {
                Toastr::error($validate->getMessageBag()->first());
                return redirect()->back()
                    ->withErrors($validate)
                    ->withInput();
            }
            $coupon = Coupon::find($id);
            $coupon->coupon_type = $request->coupon_type;
            $coupon->coupon_code = $request->coupon_code;
            $coupon->min_shopping = $request->min_shopping;
            $coupon->user_id = auth()->user()->id;
            $coupon->discount = $request->discount;
            $coupon->discount_status = $request->discount_status;
            $coupon->max_discount_amount = $request->max_discount_amount;
            $coupon->date_range = $request->datefilter;
            $coupon->status = $request->status;
            $coupon->save();
            Toastr::success('Successfully Updated.');
            return redirect()->route('admin-coupon.index');
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function adminDelete($id)
    {
        $data= Coupon::find($id);
        $data->delete();
        Toastr::success('Successfully Deleted.');
        return redirect()->route('admin-coupon.index');
    }
}
