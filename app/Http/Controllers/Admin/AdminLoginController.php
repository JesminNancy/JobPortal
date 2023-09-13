<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
