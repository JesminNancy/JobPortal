<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobGender;
use Illuminate\Http\Request;

class AdminJobGenderController extends Controller
{
    public function index(){
        $job_genders = JobGender::get();
        return view('admin.job_gender',compact('job_genders'));
    }
    public function create(){
        return view('admin.job_gender_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobGender();
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_job_gender')->with('success','Data is saved successfully');
    }
    public function edit($id){
        $single_job_gender = JobGender::where('id',$id)->first();

        return view('admin.job_gender_edit',compact('single_job_gender'));
    }
    public function update(Request $request,$id){
       $obj = JobGender::where('id',$id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->route('admin_job_gender')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        JobGender::where('id',$id)->delete();
        return redirect()->route('admin_job_gender')->with('success','Data is Deleted successfully');
    }
}
