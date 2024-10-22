<?php

namespace App\Http\Controllers;

use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    public function index()
    {
        return view('admin.pages.terms-condition', ['termsCondition' => TermsCondition::first()]);
    }
    public function update(Request $request, $id)
    {
        $termsCondition    = TermsCondition::find($id);
        $termsCondition->description    = $request->description;
        $termsCondition->status         = $request->status;
        $termsCondition->save();
        return back()->with('message', 'Terms updated successfully!');
    }




}
