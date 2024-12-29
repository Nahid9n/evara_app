<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Exception;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::latest()->paginate(100);
        return view('admin.tags.index',compact('tags'));
    }
    public function store(Request $request){
        try {
             $validate = Validator::make($request->all(),[
                  "name"         => "required",
             ]);

             if($validate->fails()){
                   return back()->with('error',$validate->messages());
             }
             $tag = new Tag();
             $tag->name = $request->name;
             $tag->slug = $request->slug;
             $tag->status = $request->status;
             $tag->save();
             return back()->with('message','Create Success.');
        }
        catch (Exception $e){
             return back()->with('error',$e->getMessage());
        }
    }
    public function update(Request $request,$id){
        try {
             $validate = Validator::make($request->all(),[
                  "name"         => "required",
             ]);

             if($validate->fails()){
                 return back()->with('error',$validate->messages());
             }
             $tag = Tag::find($id);
             $tag->name = $request->name;
             $tag->slug = $request->slug;
             $tag->status = $request->status;
             $tag->save();
            return back()->with('message','Update Success.');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
