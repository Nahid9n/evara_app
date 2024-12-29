<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function index(){
        $banners = Banner::latest()->paginate(200);
        return view('admin.banner.index',compact('banners'));
    }
    public function store(Request $request){
        try {
             $validate = Validator::make($request->all(),[
                  "image"         => "required|image|mimes:jpeg,png,jpg,gif,svg,webp",
             ]);

             if($validate->fails()){
                 return back()->with('error',$validate->messages());
             }
             $banner = new Banner();
             $image =$request->file('image');
             $imageNewName = $request->title.rand().'.'.$image->extension();
             $dir = 'admin/img/banner-img/';
             $image->move($dir,$imageNewName);
             $imgUrl =  $dir.$imageNewName;

             $banner->image = $imgUrl;
             $banner->url = $request->url;
             $banner->position = $request->position;
             $banner->status = $request->status;
             $banner->save();
             return back()->with('message', 'Banner info create successfully.');
        }
        catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function update(Request $request,$id){
        try {
             $validate = Validator::make($request->all(),[
                  "image"         => "image|mimes:jpeg,png,jpg,gif,svg,webp",
             ]);

             if($validate->fails()){
                 return back()->with('error',$validate->messages());
             }
            $banner = Banner::find($id);
             if ($request->file('image')){
                 if (isset($banner->image)){
                     unlink($banner->image);
                 }
                 $image = $request->file('image');
                 $imageNewName = $request->title.rand().'.'.$image->extension();
                 $dir = 'admin/img/banner-img/';
                 $image->move($dir,$imageNewName);
                 $imgUrl =  $dir.$imageNewName;
                 $banner->image = $imgUrl;
             }
             else{
                 $banner->image = $banner->image;
             }

            $banner->url = $request->url;
            $banner->position = $request->position;
            $banner->status = $request->status;
            $banner->save();
            return back()->with('message', 'Banner Info Update successfully.');
        }
        catch (\Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function destroy($id){
        try {
            $banner = Banner::find($id);
                if (isset($banner->image)){
                    unlink($banner->image);
                }
            $banner->delete();
            return back()->with('message', 'Banner Info Delete successfully.');
        }
        catch (\Exception $e){
             return back()->with('error',$e->getMessage());
        }
    }
}
