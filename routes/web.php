<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use Illuminate\Support\Facades\Route;

//Admin
Route::get('/admin/home',[AdminDashboardController::class,'index'])->name('admin_home')->middleware('admin:admin');
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::get('/admin/forget-password',[AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password/submit',[AdminLoginController::class,'forget_password_submit'])->name('admin_forget_password_submit');
Route::post('/admin/login-submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');

Route::get('admin/reset_password/{token}/{email}',[AdminLoginController::class,'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset_password_submit',[AdminLoginController::class,'reset_password_submit'])->name('admin_reset_password_submit');
Route::get('/admin/edit_profile',[AdminProfileController::class,'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/edit_profile_submit',[AdminProfileController::class,'profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');
