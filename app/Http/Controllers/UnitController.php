<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\Rule;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.unit.index',[
            'units' => Unit::latest()->get(),
        ]);

    }

    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'name' => 'required | unique:units,name',
                'code' => 'required'
            ],[
                'name.required'         => 'Unit name field is required',
            ]);
            Unit::newUnit($request);
            return back()->with('message', 'Unit info is created successfully.');
        }
        catch (Exception $exception){
            return back()->with('error', $exception->getMessage());
        }
    }
    public function update(Request $request, Unit $unit)
    {
        try {
            $this->validate($request,[
                'name' => ['required', Rule::unique('units')->ignore($unit->id)],
                'slug' => Rule::unique('units')->ignore($unit->id),
                'code' => 'required',
            ]);

            Unit::updateUnit($request, $unit);
            return back()->with('message','Unit info update successfully.');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy(Unit $unit)
    {
        try {
            Unit::deleteUnit($unit);
            return back()->with('message', 'Delete Unit Successfully');
        }
        catch (Exception $exception){
            return back()->with('error', $exception->getMessage());
        }

    }
}
