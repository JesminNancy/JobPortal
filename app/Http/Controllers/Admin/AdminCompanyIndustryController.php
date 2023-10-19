<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyIndustry;
use Illuminate\Http\Request;

class AdminCompanyIndustryController extends Controller
{
    public function index(){
        $company_industries = CompanyIndustry::get();
        return view('admin.company_industry',compact('company_industries'));
    }
    public function create(){
        return view('admin.company_industry_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new CompanyIndustry();
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_company_industry')->with('success','Data is saved successfully');
    }
    public function edit($id){

        $single_company_industry = CompanyIndustry::where('id',$id)->first();
        return view('admin.company_industry_edit',compact('single_company_industry'));
    }
    public function update(Request $request,$id){
       $obj = CompanyIndustry::where('id',$id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->route('admin_company_industry')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        CompanyIndustry::where('id',$id)->delete();
        return redirect()->route('admin_company_industry')->with('success','Data is Deleted successfully');
    }
}
