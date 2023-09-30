<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\PageJobCategoryItem;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index(){
        $job_categories = JobCategory::orderBy('name','asc')->get();
        $job_category_page_item = PageJobCategoryItem::where('id',1)->first();
        return view('front.job_categories',compact('job_categories','job_category_page_item'));
    }
}
