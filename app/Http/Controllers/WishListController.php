<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;
use Session;

class WishListController extends Controller
{

    private $customer, $wishListCheck, $wishList;

    public function wishListAdd($id)
    {

        $this->customer = Session::get('customer_id');
        if ($this->customer) {
            $this->wishListCheck = WishList::where('customer_id', $this->customer)
                ->where('product_id', $id)
                ->first();
            if (!$this->wishListCheck) {
                $this->wishList = new WishList();
                $this->wishList->customer_id = $this->customer;
                $this->wishList->product_id = $id;
                $this->wishList->date = date('Y-m-d');
                $this->wishList->timestamp = strtotime(date('Y-m-d'));
                $this->wishList->save();

                return back()->with('message', 'Product added to wishlist.');
            } else {
                return back()->with('message', 'Product already in wishlist.');
            }

        } else {
//            return back()->with('message','Please login/register for ad to wishlist.');
            return redirect('/login-register')->with('message', 'Please login/register for ad to wishlist.');

        }

//        return $id;
    }

    public function index()
    {
        $this->wishlist = Wishlist::where('customer_id', Session::get('customer_id'))->where('status', 1)->get();

        return view('website.customer.wishlist', [
            'wishlists' => $this->wishlist,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WishList $wishList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WishList $wishList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WishList $wishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
//    public function destroy(WishList $wishList)
//    public function destroy(string $id)
//    {
//        return $wishList;
//       //dd($id);
////        $id->delete();
//        return back()->with('message', 'Product deleted from wishlist successfully.');
//    }

    public function destroy(int $id)
    {
        $wishLists = WishList::find($id);
        //dd($wishLists);
        $wishLists->delete();
        return back()->with('message', 'Product deleted from wishlist successfully.');
    }
}
