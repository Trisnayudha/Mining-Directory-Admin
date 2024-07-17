<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('package')->nullable(); //platinum, gold, silver
            $table->string('email')->unique()->nullable(); //for login
            $table->string('password')->nullable();
            $table->string('company_name')->nullable();
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->string('video')->nullable(); //full url
            $table->string('image')->nullable(); //full url
            $table->string('banner_image')->nullable(); //full url
            $table->string('category_company')->nullable();
            $table->string('slug')->nullable();
            $table->string('email_company')->nullable();
            $table->string('prefix_phone_company')->nullable();
            $table->string('phone_company')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('value_1')->nullable();
            $table->string('value_2')->nullable();
            $table->string('value_3')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->boolean('verify_company')->default(false);
            $table->boolean('verify_email')->default(false);
            $table->string('name_representative')->nullable();
            $table->string('job_title_representative')->nullable();
            $table->string('prefix_phone_representative')->nullable();
            $table->string('phone_representative')->nullable();
            $table->text('verification_token')->nullable();
            $table->string('marketing')->nullable();
            $table->string('explore')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
}
