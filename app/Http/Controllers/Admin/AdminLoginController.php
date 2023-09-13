<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index(){
        $pass = Hash::make('123456');
        return view('admin.login',compact('pass'));
    }
    public function forget_password(){
        return view('admin.forget-password');
    }
    public function login_submit(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' =>$request->password,
        ];

        if(Auth::guard('admin')->attempt($data)){
            return redirect()->route('admin_home');
        }else{
            return redirect()->route('admin_login')->with('error','Information is not correct');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
