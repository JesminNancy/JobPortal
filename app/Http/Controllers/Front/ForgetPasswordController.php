<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PageOtherItem;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        $other_page_item = PageOtherItem::where('id',1)->first();
        return view('front.forget_password', compact('other_page_item'));
    }
}
