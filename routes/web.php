<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/home',[AdminDashboardController::class,'index'])->name('admin.home');
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin.login');
Route::get('/admin/forget-password',[AdminLoginController::class,'forget_password'])->name('admin.forget_password');
