<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyCategoryList extends Migration
{
    public function up()
    {
        Schema::create('company_category_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            // Foreign keys
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('md_category_company')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_category_list');
    }
}
