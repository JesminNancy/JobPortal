<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageItem;
use Illuminate\Http\Request;

class AdminHomePageController extends Controller
{
    public function index(){
        $home_page = HomePageItem::where('id',1)->first();
        return view('admin.home_page',compact('home_page'));
    }

    public function update(Request $request){
        $home_page = HomePageItem::where('id',1)->first();
        $request->validate([
            'heading' => 'required',
            'job_title' => 'required',
            'job_location' => 'required',
            'job_category' => 'required',
            'search' => 'required'
        ]);
        if($request->hasFile('backgroud')){
            $request->validate([
                'backgroud' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('uploads/'.$home_page->backgroud));

            $ext = $request->file('backgroud')->getClientOriginalExtension();
            $final_img = time().'.'.$ext;
            $request->file('backgroud')->move(public_path('uploads/'),$final_img );
            $home_page->backgroud= $final_img;
        }


        $home_page->heading = $request->heading;
        $home_page->text = $request->text;
        $home_page->job_title = $request->job_title;
        $home_page->job_location = $request->job_location;
        $home_page->job_category = $request->job_category;
        $home_page->search = $request->search;
        $home_page->update();
        return redirect()->back()->with('success','Home Page Data is Saved Successfully');
    }
}
