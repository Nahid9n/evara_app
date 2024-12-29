<?php

namespace App\Http\Controllers\Admin;

use App\Models\Popup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Exception;

class PopupController extends Controller
{
    public function index(){
        $popups = Popup::latest()->get();
        return view('admin.popup.index',compact('popups'));
    }
    public function store(Request $request){
//        return $request;
        try {
             $validate = Validator::make($request->all(),[
                  "popup_type"         => "required",
                  "popup_image"        => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
                  "short_popup_image"  => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
             ]);

             if($validate->fails()){
                   toastr()->error($validate->messages());
                   return redirect()->back();
             }
             $popup = new Popup();
            $popup->popup_type = $request->popup_type;
             if ($request->popup_type == 'popup'){
                 if ($request->file('popup_image')){
                     $popupImage = $request->file('popup_image');
                     $popupImageName = time().'_'.$popupImage->getClientOriginalName();
                     $directory = 'admin/img/popup/';
                     $popupImage->move($directory,$popupImageName);
                     $popupImageUrl = $directory.$popupImageName;
                     $popup->popup_image = $popupImageUrl;
                 }
             }
             if ($request->popup_type == 'short_popup'){
                 if ($request->file('short_popup_image')){
                     $shortPopupImage = $request->file('short_popup_image');
                     $shortPopupName = time().'_'.$shortPopupImage->getClientOriginalName();
                     $directory = 'admin/img/popup/';
                     $shortPopupImage->move($directory,$shortPopupName);
                     $shortPopupImageUrl = $directory.$shortPopupName;
                     $popup->short_popup_image = $shortPopupImageUrl;
                 }
             }
             $popup->title = $request->title;
             $popup->description = $request->description;
             $popup->url = $request->url;
             $popup->duration = $request->duration;
             $popup->status = $request->status;
             $popup->save();
             return back()->with('message','Create Success.');
        }
        catch (Exception $e){
             return back()->with('error',$e->getMessage());
        }
    }
    public function update(Request $request,$id){
        try {
            $validate = Validator::make($request->all(),[
                "popup_type"         => "required",
                "popup_image"        => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
                "short_popup_image"  => "nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048",
            ]);

            if($validate->fails()){
                toastr()->error($validate->messages());
                return redirect()->back();
            }
            $popup = Popup::find($id);
            $popup->popup_type = $request->popup_type;
            if ($request->popup_type == 'popup'){

                if ($request->file('popup_image')){

                    if (file_exists($popup->popup_image))
                    {
                        unlink($popup->popup_image);
                    }
                    $popupImage = $request->file('popup_image');
                    $popupImageName = time().'_'.$popupImage->getClientOriginalName();
                    $directory = 'admin/img/popup/';
                    $popupImage->move($directory,$popupImageName);
                    $popupImageUrl = $directory.$popupImageName;
                    $popup->popup_image = $popupImageUrl;
                }
            }
            if ($request->popup_type == 'short_popup'){
                if ($request->file('short_popup_image')){
                    if (file_exists($popup->short_popup_image))
                    {
                        unlink($popup->short_popup_image);
                    }
                    $shortPopupImage = $request->file('short_popup_image');
                    $shortPopupName = time().'_'.$shortPopupImage->getClientOriginalName();
                    $directory = 'admin/img/popup/';
                    $shortPopupImage->move($directory,$shortPopupName);
                    $shortPopupImageUrl = $directory.$shortPopupName;
                    $popup->short_popup_image = $shortPopupImageUrl;
                }
            }
            $popup->title = $request->title;
            $popup->description = $request->description;
            $popup->url = $request->url;
            $popup->duration = $request->duration;
            $popup->status = $request->status;
            $popup->save();
            return back()->with('message','Update Success.');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function destroy($id){
        try {
             $popup = Popup::find($id);
             if (file_exists($popup->popup_image))
             {
                unlink($popup->popup_image);
             }
             if (file_exists($popup->short_popup_image))
             {
                unlink($popup->short_popup_image);
             }
             $popup->delete();
             return back()->with('message','Delete Success.');
        }
        catch (Exception $e){
             return back()->with('error',$e->getMessage());
        }
    }
}
