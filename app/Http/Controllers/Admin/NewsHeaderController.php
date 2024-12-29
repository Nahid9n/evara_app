<?php

namespace App\Http\Controllers\Admin;

use App\Models\NewsHeader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Exception;

class NewsHeaderController extends Controller
{
    public function index(){
        $newsHeaders = NewsHeader::latest()->simplePaginate();
        return view('admin.news-header.index',compact('newsHeaders'));
    }
    public function store(Request $request){
        try {
            $validate = Validator::make($request->all(),[
                "news"         => "required",
            ]);

            if($validate->fails()){
                return back()->with('error',$validate->messages());
            }
            $news = new NewsHeader();
            $news->news = $request->news;
            $news->url = $request->url;
            $news->status = $request->status;
            $news->save();
            return back()->with('message','Create Success.');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function update(Request $request,$id){
        try {
            $validate = Validator::make($request->all(),[
                "news"         => "required",
            ]);

            if($validate->fails()){
                return back()->with('error',$validate->messages());
            }
            $news = NewsHeader::find($id);
            $news->news = $request->news;
            $news->url = $request->url;
            $news->status = $request->status;
            $news->save();
            return back()->with('message','Update Success.');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
    public function destroy($id){
        try {
            $news = NewsHeader::find($id);
            $news->delete();
            return back()->with('message','Delete Success.');
        }
        catch (Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
