<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function index(){
        return view('admin.profile');
    }

    public function profile_submit(Request $request){
        $admin_data = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        if($request->$request != ''){
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required'
            ]);

            $admin_data->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')){
            $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            ]);

            unlink(public_path('uploads/'.$admin_data->photo));

            $ext = $request->file('photo')->getClientOriginalExtension();
            $final_img = 'admin'.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_img );
            $admin_data->photo = $final_img;
        }

        $admin_data->name = $request->name;
        $admin_data->email = $request->email;
        $admin_data->update();

        return redirect()->back()->with('success','Profile is changed successfully');

    }
}
