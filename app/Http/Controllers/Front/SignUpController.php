<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index()
    {
        $other_page_item = PageOtherItem::where('id',1)->first();
        return view('front.signup', compact('other_page_item'));
    }

    public function company_signup_submit(){

    }
}
