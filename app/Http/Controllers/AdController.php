<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ad.index',[
            'ads' => Ad::all(),
            'products' => Product::where('status',1)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ad.add',[
            'ads' => Ad::latest()->get(),
            'products' => Product::where('status',1)->get(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'product_id' => 'required',
            ],[
                'product_id.required'         => 'Product is required',
            ]);

            $ad = new Ad();
            $ad->product_id                   = $request->product_id;
            $ad->title                        = $request->title;
            $ad->sub_title                     = $request->sub_title;
            if ($request->file('image')){
                $image = $request->file('banner');
                $imageName = $image->getClientOriginalName();
                $directory = 'upload/concern/';
                $image->move($directory,$imageName);
                $imageUrl = $directory.$imageName;
                $ad->image = $imageUrl;
            }
            if ($request->position){
                $adCount = Ad::count();
                $adPosition = Ad::where('position',$request->position)->first();
                if ($adPosition){
                    $adPosition->position = $adCount + 1;
                    $adPosition->save();
                    $ad->position = $request->position;
                }
                else{
                    $ad->position = $adCount + 1;
                }
            }
            else{
                $adCount = Ad::count();
                $ad->position = $adCount + 1;
            }
            if($request->offer_price){
                $ad->offer_price                  = $request->offer_price;
            }
            else{
                $ad->offer_price                  = 0;
            }
            if($request->discount){
                $ad->discount                  = $request->discount;
            }
            else{
                $ad->discount                     = 0;
            }
            $ad->status                       = $request->status;
            $ad->save();
            return back()->with('message', 'Ad info is created successfully.');
        }
        catch (Exception $exception){
            return back()->with('error', $exception->getMessage());
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        return view('admin.ad.show', [
            'ad' => $ad,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        return view('admin.ad.edit', [
            'ad' => $ad,
            'products' => Product::where('status',1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        try {
            $this->validate($request,[
                'product_id' => 'required',
            ],[
                'product_id.required'         => 'Product is required',
            ]);

            $ad->product_id                   = $request->product_id;
            $ad->title                        = $request->title;
            $ad->sub_title                     = $request->sub_title;
            if ($request->file('image')){
                if (isset($ad->image)){
                    unlink($ad->image);
                }
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $directory = 'admin/img/ad-images/';
                $image->move($directory,$imageName);
                $imageUrl = $directory.$imageName;
                $ad->image = $imageUrl;
            }
            if ($request->position == $ad->position){
                $ad->position = $request->position;
            }
            else{
                $adCount = Ad::count();
                $adSerial = Ad::where('position',$request->position)->first();
                if ($adSerial){
                    $adSerial->position = $ad->position;
                    $adSerial->save();
                    $ad->position = $request->position;
                }
                else{
                    $ad->position = $request->position;
                }
            }
            if($request->offer_price){
                $ad->offer_price                  = $request->offer_price;
            }
            else{
                $ad->offer_price                  = 0;
            }
            if($request->discount){
                $ad->discount                  = $request->discount;
            }
            else{
                $ad->discount                     = 0;
            }
            $ad->status                       = $request->status;
            $ad->save();
            return back()->with('message', 'Ad info is Updated successfully.');
        }
        catch (Exception $exception){
            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        Ad::deleteAd($ad);
        return back()->with('message', 'Delete Ad Successfully');

    }
}
