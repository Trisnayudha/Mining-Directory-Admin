<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);                   // Nama paket (Free, Silver, Gold, Platinum)
            $table->decimal('price', 10, 2);              // Harga per bulan
            $table->boolean('is_most_picked')->default(false); // Menunjukkan apakah paket ini adalah yang paling dipilih

            // Fitur dasar
            $table->string('directory_listing')->nullable();    // Directory Listing (e.g., "1 Month Trial", "Limited", etc.)
            $table->string('company_profile')->nullable();      // Company Profile (e.g., "1 Month Trial", "Limited", etc.)
            $table->boolean('e_business_card')->default(false); // E-Business Card
            $table->integer('office_branch_location')->default(0); // Jumlah lokasi kantor/cabang
            $table->boolean('access_to_statistic')->default(false); // Akses ke Statistik
            $table->boolean('premium_listing')->default(false);     // Premium Listing
            $table->boolean('search_marketing')->default(false);    // Search Marketing
            $table->string('content_posting')->nullable();      // Content Posting (e.g., "/section")

            // Jumlah resources
            $table->integer('product_service')->default(0);     // Jumlah Product & Service
            $table->integer('project')->default(0);             // Jumlah Project
            $table->integer('resource')->default(0);            // Jumlah Resource
            $table->integer('news')->default(0);                // Jumlah News

            // Profil perwakilan
            $table->integer('representative_profiles')->default(0); // Jumlah Representative Profiles
            $table->boolean('profile_picture')->default(false);     // Apakah mendukung Profile Picture
            $table->boolean('profile_name')->default(false);                // Apakah mendukung Name
            $table->boolean('position')->default(false);            // Apakah mendukung Position
            $table->boolean('contact_number')->default(false);      // Apakah mendukung Contact Number

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pricing');
    }
}
