<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailPhoneToCompanyAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_address', function (Blueprint $table) {
            $table->string('email')->nullable();
            $table->string('prefix_phone_company')->nullable();
            $table->string('phone_company')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_address', function (Blueprint $table) {
            //
        });
    }
}
