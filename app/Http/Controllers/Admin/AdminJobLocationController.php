<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobLocation;
use Illuminate\Http\Request;

class AdminJobLocationController extends Controller
{
    public function index(){
        $job_locations = JobLocation::get();
        return view('admin.job_location',compact('job_locations'));
    }
    public function create(){
        return view('admin.job_location_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new JobLocation();
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_job_location')->with('success','Data is saved successfully');
    }
    public function edit($id){
        $single_job_location = JobLocation::where('id',$id)->first();

        return view('admin.job_location_edit',compact('single_job_location'));
    }
    public function update(Request $request,$id){
       $obj = JobLocation::where('id',$id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->route('admin_job_location')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        JobLocation::where('id',$id)->delete();
        return redirect()->route('admin_job_location')->with('success','Data is Deleted successfully');
    }
}
