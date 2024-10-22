<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductOffer;
use Illuminate\Http\Request;
use Exception;

class ProductOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product-offer.index',[
            'product_offers' => ProductOffer::simplePaginate(100),
            'products' => Product::all(),
        ]);
    }
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'product_id' => 'required',
                    'title_one' => 'required',
                    "image"         => [
                        'nullable',
                        'image',
                        'mimes:jpg,png,jpeg,gif,svg,webp',
                        'dimensions:min_width=1200,min_height=736,max_width=1200,max_height=736'
                    ],
                ]
            );
            ProductOffer::newProductOffer($request);
            return back()->with('message','Product Offer Added Successfully!');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    public function update(Request $request, ProductOffer $productOffer)
    {
        try {
            $request->validate(
                [
                    'product_id' => 'required',
                    'title_one' => 'required',
                    'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp',
                ]
            );
            ProductOffer::updateProductOffer($request,$productOffer);
            return back()->with('message','Product Offer Updated Successfully!');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    public function destroy(ProductOffer $productOffer)
    {
        ProductOffer::deleteProductOffer($productOffer);
        return back()->with('message', 'Delete Product Offer Successfully');
    }
}
