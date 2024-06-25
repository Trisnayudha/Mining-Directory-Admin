<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaResource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_resource', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('company_id');
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->string('file')->nullable();
            $table->string('image')->nullable();
            $table->string('location')->nullable();
            $table->integer('views')->nullable();
            $table->integer('download')->nullable();
            $table->string('category_media_resouce')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_resource');
    }
}
