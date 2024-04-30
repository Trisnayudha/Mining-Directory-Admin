<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('company_id');
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->string('description');
            $table->integer('views')->nullable();
            $table->integer('download')->nullable();
            $table->string('file')->nullable();
            $table->string('category_project')->nullable();
            $table->string('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
