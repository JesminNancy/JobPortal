<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomePageItem;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\WhyChooseItem;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index(){
        $home_page = HomePageItem::where('id',1)->first();
        $all_job_categories = JobCategory::orderBy('name','asc')->take(9)->get();
        $all_job_locations = JobLocation::orderBy('name','asc')->get();
        $why_choose_item = WhyChooseItem::get();
        $testimonials = Testimonial::get();
        $posts = Post::orderBy('id','asc')->take(3)->get();
        return view('front.home',compact('home_page','all_job_categories','why_choose_item','testimonials','posts','all_job_locations'));
    }
}
