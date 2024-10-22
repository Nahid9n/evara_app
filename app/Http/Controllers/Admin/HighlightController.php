<?php

namespace App\Http\Controllers\Admin;

use App\Models\Highlight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Exception;

class HighlightController extends Controller
{
    public function index(){
        $highlights = Highlight::latest()->get();
        return view('admin.highlight.index',compact('highlights'));
    }

    public function store(Request $request){
        try {
             $validate = Validator::make($request->all(),[
                  "name"         => "required",
             ]);
             if($validate->fails()){
                   return back()->with('error', $validate->messages());
             }
            $highlight = new Highlight();
            $highlight->name = $request->name;
            if ($request->serial){
                $highlightCount = Highlight::count();
                $highlightSerial = Highlight::where('serial',$request->serial)->first();
                if ($highlightSerial){
                    $highlightSerial->serial = $highlightCount + 1;
                    $highlightSerial->save();
                    $highlight->serial = $request->serial;
                }
                else{
                    $highlight->serial = $highlightCount + 1;
                }
            }
            else{
                $highlightCount = Highlight::count();
                $highlight->serial = $highlightCount + 1;
            }

            $highlight->status = $request->status;
            $highlight->save();
            return back()->with('message', 'Highlight Create Successfully.');
        }
        catch (Exception $e){
             return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request,$id){
        try{
            $validate = Validator::make($request->all(),[
                'name' => 'required',
            ]);
            if($validate->fails()){
                toastr()->error($validate->messages());
                return back();
            }
            $highlight = Highlight::find($id);
            $highlight->name = $request->name;
            if ($request->serial == $highlight->serial){
                $highlight->serial = $request->serial;
            }
            else{
                $highlightSerial = Highlight::where('serial',$request->serial)->first();
                if ($highlightSerial){
                    $highlightSerial->serial = $highlight->serial;
                    $highlightSerial->save();
                    $highlight->serial = $request->serial;
                }
                else{
                    $highlight->serial = $request->serial;
                }
            }
            $highlight->status = $request->status;
            $highlight->save();
            return back()->with('message', 'Highlight Update Successfully.');
        }
        catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id){
        try {
             $s = Highlight::find($id);
             $s->delete();
             toastr()->success('Delete Success.');
             return back()->with('message', 'Highlight Update Successfully.');
        }
        catch (Exception $e){
             return back()->with('error', $e->getMessage());
        }
    }

}
