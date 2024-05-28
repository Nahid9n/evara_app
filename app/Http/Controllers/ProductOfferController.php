<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;

class ProductOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product-offer.index',['product_offers' => ProductOffer::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product-offer.add',['products' => Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'product_id' => 'required',
                'title_one' => 'required',
                'title_two' => 'required',
                'title_three' => 'required',
                'image' => 'image'
            ]
        );
        ProductOffer::newProductOffer($request);
        return back()->with('msg','Product Offer Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductOffer $productOffer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductOffer $productOffer)
    {
        return view('admin.product-offer.edit',[
            'product_offer' => $productOffer,
            'products' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductOffer $productOffer)
    {
        $request->validate(
            [
                'product_id' => 'required',
                'title_one' => 'required',
                'title_two' => 'required',
                'title_three' => 'required',
                'image' => 'image'
            ]
        );

        ProductOffer::updateProductOffer($request,$productOffer);
        return to_route('product_offer.index')->with('msg','Product Offer Updated Successfully!');
    }

//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(ProductOffer $productOffer)
//    {
//        ProductOffer::deleteProductOffer($productOffer);
//        return back()->with('msg','Product Offer Deleted Successfully!');
//    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductOffer $productOffer)
    {
        ProductOffer::deleteProductOffer($productOffer);
        return back()->with('message', 'Delete Product Offer Successfully');
    }
}
