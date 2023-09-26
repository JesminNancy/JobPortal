<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFqaController;
use App\Http\Controllers\Admin\AdminFqaPageController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPrivacyPageController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminTermPageController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminWhyChooseController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\JobCategoryController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\TermsController;
use Illuminate\Support\Facades\Route;

// Front
Route::get('',[FrontHomeController::class,'index'])->name('home');
Route::get('terms-of-use',[TermsController::class,'index'])->name('terms');
Route::get('job_categories',[JobCategoryController::class,'index'])->name('job_categories');
Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::get('fqa',[FaqController::class,'index'])->name('fqa');
Route::get('privacy-policy',[PrivacyController::class,'index'])->name('privacy');

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

    Route::get('/admin/faq_page',[AdminFqaPageController::class,'index'])->name('admin_faq_page');
    Route::post('/admin/home_page/update',[AdminFqaPageController::class,'update'])->name('admin_faq_page_update');

    Route::get('/admin/term_page',[AdminTermPageController::class,'index'])->name('admin_term_page');
    Route::post('/admin/home_page/update',[AdminTermPageController::class,'update'])->name('admin_term_page_update');

    Route::get('/admin/privacy_page',[AdminPrivacyPageController::class,'index'])->name('admin_privacy_page');
    Route::post('/admin/home_page/update',[AdminPrivacyPageController::class,'update'])->name('admin_privacy_page_update');

    Route::get('/admin/job_category/view',[AdminJobCategoryController::class,'index'])->name('admin_job_category_view');
    Route::get('/admin/job_category/create',[AdminJobCategoryController::class,'create'])->name('admin_job_category_create');
    Route::post('/admin/job_category/store',[AdminJobCategoryController::class,'store'])->name('admin_job_category_store');
    Route::get('/admin/job_category/edit/{id}',[AdminJobCategoryController::class,'edit'])->name('admin_job_category_edit');
    Route::post('/admin/job_category/update/{id}',[AdminJobCategoryController::class,'update'])->name('admin_job_category_update');
    Route::get('/admin/job_category/delete/{id}',[AdminJobCategoryController::class,'delete'])->name('admin_job_category_delete');

    Route::get('/admin/why-choose/view', [AdminWhyChooseController::class, 'index'])->name('admin_why_choose_item');
    Route::get('/admin/why-choose/create', [AdminWhyChooseController::class, 'create'])->name('admin_why_choose_item_create');
    Route::post('/admin/why-choose/store', [AdminWhyChooseController::class, 'store'])->name('admin_why_choose_item_store');
    Route::get('/admin/why-choose/edit/{id}', [AdminWhyChooseController::class, 'edit'])->name('admin_why_choose_item_edit');
    Route::post('/admin/why-choose/update/{id}', [AdminWhyChooseController::class, 'update'])->name('admin_why_choose_item_update');
    Route::get('/admin/why-choose/delete/{id}', [AdminWhyChooseController::class, 'delete'])->name('admin_why_choose_item_delete');

    Route::get('/admin/testimonial/view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial');
    Route::get('/admin/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('/admin/testimonial/store', [AdminTestimonialController::class, 'store'])->name('admin_testimonial_store');
    Route::get('/admin/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/admin/testimonial/update/{id}', [AdminTestimonialController::class, 'update'])->name('admin_testimonial_update');
    Route::get('/admin/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');

    Route::get('/admin/post/view', [AdminPostController::class, 'index'])->name('admin_post');
    Route::get('/admin/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('/admin/post/store', [AdminPostController::class, 'store'])->name('admin_post_store');
    Route::get('/admin/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('/admin/post/update/{id}', [AdminPostController::class, 'update'])->name('admin_post_update');
    Route::get('/admin/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');

    Route::get('/admin/fqa/view', [AdminFqaController::class, 'index'])->name('admin_fqa');
    Route::get('/admin/fqa/create', [AdminFqaController::class, 'create'])->name('admin_fqa_create');
    Route::post('/admin/fqa/store', [AdminFqaController::class, 'store'])->name('admin_fqa_store');
    Route::get('/admin/fqa/edit/{id}', [AdminFqaController::class, 'edit'])->name('admin_fqa_edit');
    Route::post('/admin/fqa/update/{id}', [AdminFqaController::class, 'update'])->name('admin_fqa_update');
    Route::get('/admin/fqa/delete/{id}', [AdminFqaController::class, 'delete'])->name('admin_fqa_delete');
});

