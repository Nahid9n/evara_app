<?php

namespace App\Http\Controllers;

use App\Models\ReturnPolicy;
use Illuminate\Http\Request;

class ReturnPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.return-policy', ['returnPolicy' => ReturnPolicy::latest()->first()]);
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
        ReturnPolicy::newReturnPolicy($request);
        return back()->with('message', 'New Policy Save Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReturnPolicy $returnPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReturnPolicy $returnPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ReturnPolicy $returnPolicy)
    {
        ReturnPolicy::updateReturnPolicy($request, $returnPolicy);
        return back()->with('message', 'Policy updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReturnPolicy $returnPolicy)
    {
        //
    }
}
