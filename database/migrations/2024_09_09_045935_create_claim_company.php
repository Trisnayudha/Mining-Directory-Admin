<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_company', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('company_id');
            // Existing fields
            $table->string('full_name')->nullable();
            $table->string('position_title')->nullable();
            $table->string('email')->nullable();
            $table->string('alternate_email')->nullable();
            $table->string('code_phone', 10)->nullable();
            $table->string('phone', 20)->nullable();

            // New fields based on the updated form
            $table->string('company_name')->nullable(); // Nama perusahaan
            $table->string('company_category')->nullable(); // Kategori perusahaan
            $table->string('classification_company')->nullable(); // Klasifikasi perusahaan
            $table->string('project_type')->nullable(); // Tipe proyek
            $table->string('company_address')->nullable(); // Alamat perusahaan
            $table->string('city')->nullable(); // Kota perusahaan
            $table->string('state')->nullable(); // Provinsi atau negara bagian
            $table->string('country')->nullable(); // Negara perusahaan
            $table->string('postal_code')->nullable(); // Kode pos

            // Phone with code
            $table->string('code_company_phone', 10)->nullable(); // Kode negara telepon perusahaan
            $table->string('company_phone_number', 20)->nullable(); // Nomor telepon perusahaan

            $table->string('company_email')->nullable(); // Email perusahaan
            $table->string('company_website')->nullable(); // Website perusahaan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim_company');
    }
}
