<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::get();
        return view('admin.package', compact('packages'));
    }

    public function create()
    {
        return view('admin.package_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_days' => 'required',
            'package_display_time' => 'required',
            'total_allowed_job' => 'required',
            'total_allowed_featured_job' => 'required',
            'total_allowed_photos' => 'required',
            'total_allowed_videos' => 'required'

        ]);

        $obj = new Package();
        $obj->package_name = $request->package_name;
        $obj->package_price = $request->package_price;
        $obj->package_days = $request->package_days;
        $obj->package_display_time = $request->package_display_time;
        $obj->total_allowed_job = $request->total_allowed_job;
        $obj->total_allowed_featured_job = $request->total_allowed_featured_job;
        $obj->total_allowed_photos = $request->total_allowed_photos;
        $obj->total_allowed_videos = $request->total_allowed_videos;
        $obj->save();

        return redirect()->route('admin_package')->with('success', 'Data is saved successfully.');

    }

    public function edit($id)
    {
        $single_package = Package::where('id',$id)->first();
        return view('admin.package_edit',compact('single_package'));
    }

    public function update(Request $request, $id)
    {
        $obj = Package::where('id',$id)->first();

        $request->validate([
            'package_name' => 'required',
            'package_price' => 'required',
            'package_days' => 'required',
            'package_display_time' => 'required',
            'total_allowed_job' => 'required',
            'total_allowed_featured_job' => 'required',
            'total_allowed_photos' => 'required',
            'total_allowed_videos' => 'required'
        ]);
        $obj->package_name = $request->package_name;
        $obj->package_price = $request->package_price;
        $obj->package_days = $request->package_days;
        $obj->package_display_time = $request->package_display_time;
        $obj->total_allowed_job = $request->total_allowed_job;
        $obj->total_allowed_featured_job = $request->total_allowed_featured_job;
        $obj->total_allowed_photos = $request->total_allowed_photos;
        $obj->total_allowed_videos = $request->total_allowed_videos;
        $obj->update();

        return redirect()->route('admin_package')->with('success', 'Data is updated successfully.');

    }

    public function delete($id)
    {
        Package::where('id',$id)->delete();
        return redirect()->route('admin_package')->with('success', 'Data is deleted successfully');
    }
}
