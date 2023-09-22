<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomePageItem;
use App\Models\JobCategory;
use App\Models\WhyChooseItem;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index(){
        $home_page = HomePageItem::where('id',1)->first();
        $job_categories = JobCategory::orderBy('name','asc')->take(9)->get();
        $why_choose_item = WhyChooseItem::get();
        return view('front.home',compact('home_page','job_categories','why_choose_item'));
    }
}
