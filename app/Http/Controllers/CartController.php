<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;
use Session;


class CartController extends Controller
{

    public static $product;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        return Cart::content();
        return view('website.cart.index',[
            'products' => Cart::where('customer_id', Session::get('customer_id'))->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        return $request;


        self::$product = Product::find($request->id);

        Cart::add([
            'id'        => $request->id,
            'name'      => self::$product->name,
            'qty'       => $request->qty,
            'price'     => self::$product->selling_price,
            'options'   =>
                [
                    'image'  => self::$product->image,
                    'code'   => self::$product->code,
                    'size'   => $request->size,
                    'color'   => $request->color,
                ]
        ]);

//        return Cart::content();
//        return redirect(route('cart.index'))->with('messages','Add to Cart sucessfully');
        return redirect('/cart')->with('messages','Add to Cart sucessfully');

    }
    public function cartAdd(Request $request){
        if(!Session::get('customer_id')){
            return response()->json([
                'status' => false,
                'error' => "Please login first"
            ]);
        }
        $product = Product::find($request->product_id);
        if(!$product){
            return response()->json([
                'status' => false,
                'error' => "Product not found"
            ]);
        }
        $checkProductInCart = Cart::where('product_id',$request->product_id)
            ->where('color',$request->color)
            ->where('size',$request->size)
            ->first();
        if ($checkProductInCart){
            return response()->json([
                'status' => false,
                'error' => "already have into cart",
            ]);
        }
        else{
            $cart = new Cart();
            $cart->product_id = $request->product_id;
            $cart->customer_id = Session::get('customer_id');
            $cart->name = $product->name;
            $cart->qty = $request->qty;
            $cart->size = $request->size;
            $cart->color = $request->color;
            $cart->image = $product->image;
            $cart->code = $product->code;
            $cart->seller_id = $product->vendor_id;
            $cart->save();
            return response()->json([
                'message' => "Product added",
                'count' => count(Cart::where('customer_id', Session::get('customer_id'))->get())
            ]);
        }

    }
    public function getCartDetails(){
        $cartContents = Cart::where('customer_id', Session::get('customer_id'))->get();
        return view('website.cart.ajaxcartitem', compact('cartContents'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove ($id);
        return back()->with('message','Cart product remove successfully.');
    }


    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return back()->with('message','Cart product remove successfully.');
    }
    public function clearCart(Request $request)
    {
        $ids = json_decode($request->ids);
        $carts = Cart::whereIn('id',$ids)->get();
        foreach ($carts as $cart){
            $cart->delete();
        }
        return back()->with('message','Cart Clear successfully.');
    }


    public function updateProduct(Request $request)
    {
//        return $request->data;
        foreach ($request->data  as $item) {

            Cart::update($item['rowId'], $item['qty']);

        }

        return redirect('/cart')->with('message','Cart product update successfully');
    }





}
