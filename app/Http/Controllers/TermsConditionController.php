<?php

namespace App\Http\Controllers;

use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.terms-condition', ['termsCondition' => TermsCondition::latest()->first()]);
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
        TermsCondition::newTermsCondition($request);
        return back()->with('message', 'New Terms Save Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TermsCondition $termsCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TermsCondition $termsCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TermsCondition $termsCondition)
    {
        TermsCondition::updateTermsCondition($request, $termsCondition);
        return back()->with('message', 'Terms updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TermsCondition $termsCondition)
    {
        //
    }



}
