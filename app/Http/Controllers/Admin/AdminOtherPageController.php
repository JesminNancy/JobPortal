<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;

class AdminOtherPageController extends Controller
{
    public function index(){
        $other_page = PageOtherItem::where('id',1)->first();
        return view('admin.other_page',compact('other_page'));
    }

    public function update(Request $request){
        $other_page = PageOtherItem::where('id',1)->first();
        $request->validate([
            'login_page_heading' => 'required',
            'signup_page_heading' => 'required',
            'forget_password_page_heading' => 'required',
            // 'job_listing_page_heading' => 'required',
            // 'company_listing_page_heading' => 'required'
        ]);


        $other_page->login_page_heading = $request->login_page_heading;
        $other_page->login_page_title = $request->login_page_title;
        $other_page->login_page_meta_description = $request->login_page_meta_description;
        $other_page->signup_page_heading = $request->signup_page_heading;
        $other_page->signup_page_title = $request->signup_page_title;
        $other_page->signup_page_meta_description = $request->signup_page_meta_description;
        $other_page->forget_password_page_heading = $request->forget_password_page_heading;
        $other_page->forget_password_page_title = $request->forget_password_page_title;
        $other_page->forget_password_page_meta_description = $request->forget_password_page_meta_description;

        $other_page->update();

        return redirect()->back()->with('success','Home Page Data is Saved Successfully');
    }
}
