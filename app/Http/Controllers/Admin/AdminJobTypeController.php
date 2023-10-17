<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class AdminJobTypeController extends Controller
{
    public function index(){
        $job_types = JobType::get();
        return view('admin.job_type',compact('job_types'));
    }
    public function create(){
        return view('admin.job_type_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobType();
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_job_type_view')->with('success','Data is saved successfully');
    }
    public function edit($id){
        $single_job_type = JobType::where('id',$id)->first();

        return view('admin.job_type_edit',compact('single_job_type'));
    }
    public function update(Request $request,$id){
       $obj = JobType::where('id',$id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->route('admin_job_type_view')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        JobType::where('id',$id)->delete();
        return redirect()->route('admin_job_type_view')->with('success','Data is Deleted successfully');
    }
}
