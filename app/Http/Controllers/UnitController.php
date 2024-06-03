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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit.add');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        try {
            Unit::checkStatus($unit);
            return back()->with('message','Unit is updated');
        }
        catch (Exception $exception){
            return back()->with('error', $exception->getMessage());
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        return view('admin.unit.edit', [
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        try {
            $this->validate($request,[
                'name' => ['required', Rule::unique('units')->ignore($unit->id)],
                'slug' => Rule::unique('units')->ignore($unit->id),
                'code' => 'required',
            ]);

            Unit::updateUnit($request, $unit);
            return redirect()->route('unit.index')->with('message','Unit info update successfully.');
        }
        catch (Exception $e){
            return back()->with('error', $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
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
