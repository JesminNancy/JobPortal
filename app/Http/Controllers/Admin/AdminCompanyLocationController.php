<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyLocation;
use Illuminate\Http\Request;

class AdminCompanyLocationController extends Controller
{
    public function index(){
        $company_locations = CompanyLocation::get();
        return view('admin.company_location',compact('company_locations'));
    }
    public function create(){
        return view('admin.company_location_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new CompanyLocation();
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_company_location')->with('success','Data is saved successfully');
    }
    public function edit($id){

        $single_company_location = CompanyLocation::where('id',$id)->first();
        return view('admin.company_location_edit',compact('single_company_location'));
    }
    public function update(Request $request,$id){
       $obj = CompanyLocation::where('id',$id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->route('admin_company_location')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        CompanyLocation::where('id',$id)->delete();
        return redirect()->route('admin_company_location')->with('success','Data is Deleted successfully');
    }
}
