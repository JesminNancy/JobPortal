<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomePageItem;
use Illuminate\Http\Request;

class FrontHomeController extends Controller
{
    public function index(){
        $home_page = HomePageItem::where('id',1)->first();
        return view('front.home',compact('home_page'));
    }
}
