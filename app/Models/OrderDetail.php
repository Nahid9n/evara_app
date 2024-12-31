<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class OrderDetail extends Model
{
    use HasFactory;

    private static $orderDetail, $orderDetails;

    public static function newOrderDetail($order,$customer_id)
    {

        foreach (Cart::where('customer_id',$customer_id->id)->get() as $item){

            $product = Product::find($item->product_id);
            self::$orderDetail = new OrderDetail();
            self::$orderDetail->order_id                  = $order->id;
            self::$orderDetail->product_id                = $item->product_id;
            self::$orderDetail->product_name              = $item->name;
            self::$orderDetail->product_color             = $item->color;
            self::$orderDetail->product_size              = $item->size;
            self::$orderDetail->product_price             = $product->selling_price;
            self::$orderDetail->product_qty               = $item->qty;
            self::$orderDetail->save();

            $item->delete();

        }

    }

    public static function deleteOrderDetailInfo($id)
    {
        self::$orderDetails = OrderDetail::where('order_id', $id)->get();

        foreach (self::$orderDetails as  $orderDetail){
            $orderDetail->delete();
        }
    }

    public function user(){
        return $this->hasOne(User::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','user_id');
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

}
