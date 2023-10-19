<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySize;
use Illuminate\Http\Request;

class AdminCompanySizeController extends Controller
{
    public function index(){
        $company_sizes = CompanySize::get();
        return view('admin.company_size',compact('company_sizes'));
    }
    public function create(){
        return view('admin.company_size_add');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $obj = new CompanySize();
        $obj->name = $request->name;
        $obj->save();
        return redirect()->route('admin_company_size')->with('success','Data is saved successfully');
    }
    public function edit($id){

        $single_company_size = CompanySize::where('id',$id)->first();
        return view('admin.company_size_edit',compact('single_company_size'));
    }
    public function update(Request $request,$id){
       $obj = CompanySize::where('id',$id)->first();
        $request->validate([
            'name' => 'required'
        ]);
        $obj->name = $request->name;
        $obj->update();
        return redirect()->route('admin_company_size')->with('success','Data is Updated successfully');
    }
    public function delete($id){
        CompanySize::where('id',$id)->delete();
        return redirect()->route('admin_company_size')->with('success','Data is Deleted successfully');
    }
}
