<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobExperience;
use Illuminate\Http\Request;

class AdminJobExperienceController extends Controller
{
    public function index(){
        $job_experiences = JobExperience::get();
        return view('admin.job_experience',compact('job_experiences'));
    }
    public function create(){
        return view('admin.job_experience_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobExperience();
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_job_experience')->with('success','Data is saved successfully');
    }
    public function edit($id){
        $single_job_experience = JobExperience::where('id',$id)->first();

        return view('admin.job_experience_edit',compact('single_job_experience'));
    }
    public function update(Request $request,$id){
       $obj = JobExperience::where('id',$id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->route('admin_job_experience')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        JobExperience::where('id',$id)->delete();
        return redirect()->route('admin_job_experience')->with('success','Data is Deleted successfully');
    }
}
