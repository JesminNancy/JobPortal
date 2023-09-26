<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Fqa;
use App\Models\PageFaqItem;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Fqa::get();
        $faq_page_item = PageFaqItem::where('id',1)->first();
        return view('front.faq', compact('faqs','faq_page_item'));
    }
}
