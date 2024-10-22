<?php

namespace App\Http\Controllers;

use App\Models\ReturnPolicy;
use Illuminate\Http\Request;

class ReturnPolicyController extends Controller
{
    public function index()
    {
        return view('admin.pages.return-policy', ['returnPolicy' => ReturnPolicy::first()]);
    }

    public function update(Request $request, $id)
    {
        $returnPolicy = ReturnPolicy::find($id);
        $returnPolicy->description    = $request->description;
        $returnPolicy->status         = $request->status;
        $returnPolicy->save();
        return back()->with('message', 'Policy updated successfully!');
    }
}
