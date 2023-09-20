<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\TermsController;
use Illuminate\Support\Facades\Route;

// Front
Route::get('',[FrontHomeController::class,'index'])->name('home');
Route::get('terms',[TermsController::class,'index'])->name('terms');

//Admin

Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin_login');
Route::get('/admin/forget-password',[AdminLoginController::class,'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password/submit',[AdminLoginController::class,'forget_password_submit'])->name('admin_forget_password_submit');
Route::post('/admin/login-submit',[AdminLoginController::class,'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout',[AdminLoginController::class,'logout'])->name('admin_logout');

Route::get('admin/reset_password/{token}/{email}',[AdminLoginController::class,'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset_password_submit',[AdminLoginController::class,'reset_password_submit'])->name('admin_reset_password_submit');

/*....Admin with Middleware......*/

Route::middleware(['admin:admin'])->group(function(){
    Route::get('/admin/home',[AdminDashboardController::class,'index'])->name('admin_home');
    Route::get('/admin/edit_profile',[AdminProfileController::class,'index'])->name('admin_profile');
    Route::post('/admin/edit_profile_submit',[AdminProfileController::class,'profile_submit'])->name('admin_profile_submit');
    Route::get('/admin/home_page',[AdminHomePageController::class,'index'])->name('admin_home_page');
    Route::post('/admin/home_page/update',[AdminHomePageController::class,'update'])->name('admin_home_page_update');


    Route::get('/admin/job_category/view',[AdminJobCategoryController::class,'index'])->name('admin_job_category_view');
    Route::get('/admin/job_category/create',[AdminJobCategoryController::class,'create'])->name('admin_job_category_create');
    Route::post('/admin/job_category/store',[AdminJobCategoryController::class,'store'])->name('admin_job_category_store');
    Route::get('/admin/job_category/edit/{id}',[AdminJobCategoryController::class,'edit'])->name('admin_job_category_edit');
    Route::post('/admin/job_category/update/{id}',[AdminJobCategoryController::class,'update'])->name('admin_job_category_update');
    Route::get('/admin/job_category/delete/{id}',[AdminJobCategoryController::class,'delete'])->name('admin_job_category_delete');
});

