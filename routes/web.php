<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use Illuminate\Support\Facades\Route;

//Admin
Route::get('/admin/home',[AdminDashboardController::class,'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::get('/admin/forget-password',[AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password/submit',[AdminLoginController::class,'forget_password_submit'])->name('admin_forget_password_submit');
Route::post('/admin/login-submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');
