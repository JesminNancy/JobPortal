<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobSalaryRange;
use Illuminate\Http\Request;

class AdminJobSalaryRangeController extends Controller
{
    public function index(){
        $job_salary_ranges = JobSalaryRange::get();
        return view('admin.job_salary_range',compact('job_salary_ranges'));
    }
    public function create(){
        return view('admin.job_salary_range_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobSalaryRange();
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_job_salary_range')->with('success','Data is saved successfully');
    }
    public function edit($id){

        $single_job_salary_range = JobSalaryRange::where('id',$id)->first();
        return view('admin.job_salary_range_edit',compact('single_job_salary_range'));
    }
    public function update(Request $request,$id){
       $obj = JobSalaryRange::where('id',$id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->route('admin_job_salary_range')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        JobSalaryRange::where('id',$id)->delete();
        return redirect()->route('admin_job_salary_range')->with('success','Data is Deleted successfully');
    }
}
