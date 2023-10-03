<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PagePricingItem;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $packages = Package::get();
        $pricing_page_item = PagePricingItem::where('id',1)->first();
        return view('front.package', compact('packages','pricing_page_item'));
    }
}




