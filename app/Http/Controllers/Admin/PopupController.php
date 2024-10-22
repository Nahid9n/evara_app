<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Exception;

class PopupController extends Controller
{
    public function index(){
        return view('');
    }
    public function store(Request $request){
        try {
             $validate = Validator::make($request->all(),[
                  "name"         => "required",
             ]);

             if($validate->fails()){
                   toastr()->error($validate->messages());
                   return redirect()->back();
             }
             $s = new Model();
             $s->status = $request->status;
             $s->save();
             toastr()->success('Create Success.');
             return redirect()->route('');
        }
        catch (Exception $e){
             toastr()->error($e->getMessage());
             return back();
        }
    }
}
