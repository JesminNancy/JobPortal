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
            'search' => 'required',
            'job_category_heading' => 'required',
            'job_category_status' => 'required',
            'why_choose_heading' => 'required',
            'why_choose_status' => 'required',
            'featured_jobs_heading' => 'required',
            'featured_jobs_status' => 'required',
            'testimonial_heading' => 'required',
            'testimonial_status' => 'required',
            'blog_heading' => 'required',
            'blog_status' => 'required',
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

        if($request->hasFile('why_choose_background')){
            $request->validate([
                'why_choose_background' => 'image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('uploads/'.$home_page->why_choose_background));

            $ext = $request->file('why_choose_background')->getClientOriginalExtension();
            $image_name ='why_choose_background_'.time().'.'.$ext;

            $request->file('why_choose_background')->move(public_path('uploads/'),$image_name);

            $home_page->why_choose_background= $image_name;
        }

        if($request->hasFile('testimonial_background')) {
            $request->validate([
                'testimonial_background' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            unlink(public_path('uploads/'.$home_page->testimonial_background));

            $ext1 = $request->file('testimonial_background')->extension();
            $final_name1 = 'testimonial_home_background'.'.'.$ext1;

            $request->file('testimonial_background')->move(public_path('uploads/'),$final_name1);

            $home_page->testimonial_background = $final_name1;
        }

        $home_page->heading = $request->heading;
        $home_page->text = $request->text;
        $home_page->job_title = $request->job_title;
        $home_page->job_location = $request->job_location;
        $home_page->job_category = $request->job_category;
        $home_page->search = $request->search;

        $home_page->job_category_heading = $request->job_category_heading;
        $home_page->job_category_subheading = $request->job_category_subheading;
        $home_page->job_category_status = $request->why_choose_status;

        $home_page->why_choose_heading = $request->why_choose_heading;
        $home_page->why_choose_subheading = $request->why_choose_subheading;
        $home_page->why_choose_status = $request->why_choose_status;

        $home_page->featured_jobs_heading = $request->featured_jobs_heading;
        $home_page->featured_jobs_text = $request->featured_jobs_text;
        $home_page->featured_jobs_status = $request->featured_jobs_status;

        $home_page->testimonial_heading = $request->testimonial_heading;        $home_page->testimonial_status = $request->testimonial_status;

        $home_page->blog_heading = $request->blog_heading;
        $home_page->blog_subheading = $request->blog_subheading;
        $home_page->blog_status = $request->blog_status;

        $home_page->title = $request->title;
        $home_page->meta_description = $request->meta_description;

        $home_page->update();

        return redirect()->back()->with('success','Home Page Data is Saved Successfully');
    }
}
