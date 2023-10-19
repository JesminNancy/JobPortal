<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class AdminJobCategoryController extends Controller
{
    public function index(){
        $job_categories = JobCategory::get();
        return view ('admin.job_category',compact('job_categories'));
    }
    public function create(){
        return view('admin.job_category_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $obj = new JobCategory();
        $obj->name = $request->name;
        $obj->icon = $request->icon;
        $obj->save();
        return redirect()->route('admin_job_category')->with('success','Data is saved successfully');
    }
    public function edit($id){
        $single_job_category = JobCategory::where('id',$id)->first();

        return view('admin.job_category_edit',compact('single_job_category'));
    }
    public function update(Request $request,$id){
       $obj = JobCategory::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->icon = $request->icon;
        $obj->update();
        return redirect()->route('admin_job_category')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        JobCategory::where('id',$id)->delete();
        return redirect()->route('admin_job_category')->with('success','Data is Deleted successfully');
    }
}
