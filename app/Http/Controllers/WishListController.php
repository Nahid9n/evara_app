<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Session;

class WishListController extends Controller
{

    private $customer, $wishListCheck, $wishList;

    public function wishListAdd()
    {

        if (auth()->user()->id) {
            $this->wishListCheck = WishList::where('customer_id', auth()->user()->id)->where('product_id', $_GET['product_id'])->first();
            if (!$this->wishListCheck) {
                $this->wishList = new WishList();
                $this->wishList->customer_id = auth()->user()->id;
                $this->wishList->product_id = $_GET['product_id'];
                $this->wishList->date = date('Y-m-d');
                $this->wishList->timestamp = strtotime(date('Y-m-d'));
                $this->wishList->save();

                return response()->json([
                    'message' => "Product added to wishlist.",
                    'count' => count(WishList::where('customer_id', auth()->user()->id)->get()),
                ]);
            } else {
                Toastr::error("Product already in wishlist.");
                return response()->json([
                    'status' => false,
                    'error' => "Product already in wishlist."
                ]);
            }

        } else {
//            return back()->with('message','Please login/register for ad to wishlist.');
            Toastr::error("Please login/register for ad to wishlist.");
            return response()->json([
                'status' => false,
                'error' => "Please login/register for ad to wishlist."
            ]);


        }

//        return $id;
    }

    public function index()
    {
        $this->wishlist = Wishlist::where('customer_id', auth()->user()->id)->where('status', 1)->get();

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
