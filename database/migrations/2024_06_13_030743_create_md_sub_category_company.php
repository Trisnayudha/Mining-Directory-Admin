<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMdSubCategoryCompany extends Migration
{
    public function up()
    {
        Schema::create('md_sub_category_company', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // Foreign key
            // $table->foreign('category_id')->references('id')->on('md_category_company')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('md_sub_category_company');
    }
}
