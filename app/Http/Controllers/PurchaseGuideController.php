<?php

namespace App\Http\Controllers;

use App\Models\PurchaseGuide;
use Illuminate\Http\Request;

class PurchaseGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.purchase-guide', ['purchaseGuide' => PurchaseGuide::latest()->first()]);
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
        PurchaseGuide::newPurchaseGuide($request);
        return back()->with('message', 'New Guide Save Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseGuide $purchaseGuide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseGuide $purchaseGuide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseGuide $purchaseGuide)
    {
        PurchaseGuide::updatePurchaseGuide($request, $purchaseGuide);
        return back()->with('message', 'Guide updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseGuide $purchaseGuide)
    {
        //
    }


}
