<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyDashboardController extends Controller
{
    public function dashboard(){
        return view('company.dashboard');
    }
}
