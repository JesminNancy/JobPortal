<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('home_page_items', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('text');
            $table->string('job_title');
            $table->string('job_location');
            $table->string('job_category');
            $table->string('search');
            $table->string('backgroud');
            $table->text('job_category_heading');
            $table->text('job_category_subheading');
            $table->text('job_category_status');
            $table->text('why_choose_heading');
            $table->text('why_choose_subheading');
            $table->text('why_choose_background');
            $table->text('why_choose_status');
            $table->text('featured_jobs_heading');
            $table->text('featured_jobs_text');
            $table->text('featured_jobs_status');
            $table->text('blog_heading');
            $table->text('blog_subheading');
            $table->text('blog_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_items');
    }
};
