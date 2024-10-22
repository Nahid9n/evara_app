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
        return view('admin.pages.purchase-guide', ['purchaseGuide' => PurchaseGuide::first()]);
    }
    public function update(Request $request, $id)
    {
        $purchaseGuide    = PurchaseGuide::find($id);
        $purchaseGuide->description    = $request->description;
        $purchaseGuide->status         = $request->status;
        $purchaseGuide->save();
        return back()->with('message', 'Guide updated successfully!');
    }


}
