<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Exception;

class PageController extends Controller
{
    public function index(){

        return view('admin.pages.index',[
            'pages'=>Page::latest()->simplePaginate(100),
        ]);
    }
    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255|unique:pages,name,except,id',
            ]);
            if ($validate->fails()) {
                return back()->with('error',$validate->messages());
            }
            $page = new Page();
            $page->name = $request->name;
            $page->slug = Str::slug($request->name);
            $page->contents = $request->contents;
            if ($request->serial){
                $pageCount = Page::count();
                $pageSerial = Page::where('serial',$request->serial)->first();
                if ($pageSerial){
                    $pageSerial->serial = $pageCount + 1;
                    $pageSerial->save();
                    $page->serial = $request->serial;
                }
                else{
                    $page->serial = $pageCount + 1;
                }
            }
            else{
                $pageCount = Page::count();
                $page->serial = $pageCount + 1;
            }
            $page->status = $request->status;
            $page->save();
            return back()->with('message','Successfully Added.');

        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }
    public function edit($id)
    {
        return view('admin.pages.edit',[
            'page' => Page::find($id),
        ]);
    }
    public function update(Request $request, $id)
    {
        try {
            $validate = Validator::make($request->all(), [
                'name' => 'required|string:255',
            ]);
            if ($validate->fails()) {
                return back()->with('error',$validate->messages());
            }
            $page = Page::find($id);
            $page->name = $request->name;
            $page->slug = Str::slug($request->name);
            $page->contents = $request->contents;
            if ($request->serial == $page->serial){
                $page->serial = $request->serial;
            }
            else{
                $pageSerial = Page::where('serial',$request->serial)->first();
                if ($pageSerial){
                    $pageSerial->serial = $page->serial;
                    $pageSerial->save();
                    $page->serial = $request->serial;
                }
                else{
                    $page->serial = $request->serial;
                }
            }
            $page->status = $request->status;
            $page->save();
            return redirect()->route('admin.page.index')->with('message','Successfully Update.');

        } catch (Exception $e) {
            return back()->with('error',$e->getMessage());
        }
    }
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return back()->with('message','Successfully Delete.');
    }
    public function details($slug){
        return view('website.pages.policies',[
            'page'=>Page::where('slug',$slug)->first(),
        ]);
    }
}
