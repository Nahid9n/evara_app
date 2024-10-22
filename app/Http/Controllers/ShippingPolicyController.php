<?php

namespace App\Http\Controllers;

use App\Models\ShippingPolicy;
use Illuminate\Http\Request;

class ShippingPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.shipping-policy', ['shippingPolicy' => ShippingPolicy::first()]);
    }

    public function update(Request $request, $id)
    {
        $Policy = ShippingPolicy::find($id);
        $Policy->description    = $request->description;
        $Policy->status         = $request->status;
        $Policy->save();
        return back()->with('message', 'Policy updated successfully!');
    }



}
