<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsCarousel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_carousel', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image');  // Kolom untuk menyimpan URL gambar banner
            $table->string('redirect_link')->nullable(); // Kolom untuk menyimpan URL redirect link
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
        Schema::dropIfExists('ms_carousel');
    }
}
