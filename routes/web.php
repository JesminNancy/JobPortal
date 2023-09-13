<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/home',[AdminDashboardController::class,'index'])->name('admin.home');
