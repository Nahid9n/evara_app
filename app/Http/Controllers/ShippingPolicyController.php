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
        return view('admin.pages.shipping-policy', ['shippingPolicy' => ShippingPolicy::latest()->first()]);
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
        ShippingPolicy::newShippingPolicy($request);
        return back()->with('message', 'New Policy Save Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingPolicy $shippingPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingPolicy $shippingPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingPolicy $shippingPolicy)
    {
        ShippingPolicy::updateShippingPolicy($request, $shippingPolicy);
        return back()->with('message', 'Policy updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingPolicy $shippingPolicy)
    {
        //
    }


}
