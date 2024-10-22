<?php

namespace App\Http\Controllers;
use App\Models\User;
use Exception;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\CouponUsed;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Brian2694\Toastr\Facades\Toastr;

use Session;

use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail, $sslCommerzPayment;

    public function index()
    {
        $this->customer = '';

        if( auth()->user()){
            $this->customer = Customer::where('user_id',auth()->user()->id)->first();
        }
        $cartItems = Cart::where('customer_id',auth()->user()->id)->get();
        return view('website.checkout.index',[
            'customer' =>  $this->customer,
            'cartItems' =>  $cartItems,
        ]);
    }
    public function couponCodeApply(Request $request){

        try {
            $this->validate($request,[
                'coupon' => 'required'
            ]);
            $couponMain = Coupon::where('coupon_code',$request->coupon)->first();
            if ($couponMain){
                if ($couponMain->coupon_type == 'product'){
                    $cartContents = Cart::where('customer_id', auth()->user()->id)->get('product_id');
                    $cartContentProductIds = array();
                    foreach ($cartContents as $content){
                        array_push($cartContentProductIds,$content->product_id);
                    }

                    $usedCoupon = CouponUsed::where('coupon_id',$couponMain->id)->first();
                    $couponProducts = Coupon::whereIn('product_id',$cartContentProductIds)->get();
                    $couponProductIds = array();
                    foreach ($couponProducts as $coupon){
                        if ($request->coupon == $coupon->coupon_code){
                            array_push($couponProductIds,$coupon->product_id);
                        }
                    }
                    $couponProducts = Coupon::whereIn('product_id',$couponProductIds)->get();

                    if (!$usedCoupon){
                        if ($couponProducts != ''){
                            foreach ($couponProducts as $product){
                                $productProduct_id = $product->product_id;
                                if ($product->coupon_code == $request->coupon){
                                    $cartContent = Cart::where('customer_id', auth()->user()->id)->where('product_id',$product->product_id)->first();
                                    if ($product->discount_status == 1){
                                        $discount = ($cartContent->price * $product->discount)/100;
                                        $cartContentPrice = $cartContent->price - $discount;
                                    }
                                    elseif ($product->discount_status == 0){
                                        $discount = $product->discount;
                                        $cartContentPrice = $cartContent->price - $product->discount;
                                    }
                                    $usedCoupon_id = $couponMain->id;
                                    $usedUser_id = auth()->user()->id;
                                    Toastr::success('apply coupon success.');
                                    return back()->with([
                                        'discount' => $discount,
                                        'couponType' => $couponMain->coupon_type,
                                        'cartContentPrice' => $cartContentPrice,
                                        'usedCoupon_id' => $usedCoupon_id,
                                        'usedUser_id' => $usedUser_id,
                                        'productProduct_id' => $productProduct_id,
                                        'couponMain_productId' => $couponMain->product_id,
                                    ]);
                                }
                                else{
                                    Toastr::error('Invalid Coupon Code');
                                    return back();
                                }
                            }
                        }
                        else{
                            Toastr::error('Invalid Coupon Code');
                            return back();
                        }
                    }
                    else{
                        Toastr::error('Invalid Coupon Code');
                        return back();
                    }
                }
                else{
                    $usedCoupon = CouponUsed::where('coupon_id',$couponMain->id)->first();
                    if (!$usedCoupon){

                        if ($couponMain->discount_status == 1){
                            $discount = ($request->order_total * $couponMain->discount)/100;
                            $cartTotal = $request->order_total - $discount;
                        }
                        elseif ($couponMain->discount_status == 0){

                            $discount = $couponMain->discount;
                            $cartTotal = $request->order_total - $discount;
                        }

                        $usedCoupon_id = $couponMain->id;
                        $usedUser_id = auth()->user()->id;
                        Toastr::success('apply coupon success.');
                        return back()->with([
                            'discount' => $discount,
                            'couponType' => $couponMain->coupon_type,
                            'cartTotal' => $cartTotal,
                            'usedCoupon_id' => $usedCoupon_id,
                            'usedUser_id' => $usedUser_id,
                            'couponMain_productId' => $couponMain->product_id,
                        ]);
                    }
                    else{
                        Toastr::error('Invalid Coupon Code');
                        return back();
                    }
                }
            }
            else{
                Toastr::error('Invalid Coupon');
                return back();
            }
        }
        catch (Exception $e){
            Toastr::error($e->getMessage());
            return back();
        }
    }
    public function newOrder( Request $request){

//        return $request;

        $this->customer = Customer::where('email', $request->email)->orWhere('mobile',$request->mobile)->first();

        if ( !$this->customer ){
           $this->customer = Customer::newCustomer($request);
        }

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        if ($request->payment_method == 'Online'){
            $this->sslCommerzPayment = new SslCommerzPaymentController();

            $this->sslCommerzPayment->index($request, $this->customer);

        }
        elseif ($request->payment_method == 'Cash'){
            $this->order = Order::newOrder($this->customer, $request);
            OrderDetail::newOrderDetail($this->order,$this->customer);
            return redirect()->route('complete-order')->with('message','Congratulation... your order success. Please check your mail and wait we will contact with you soon.');
        }


    }

    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }


}
