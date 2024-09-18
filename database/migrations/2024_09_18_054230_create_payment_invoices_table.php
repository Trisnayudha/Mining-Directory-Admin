<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('user_id'); // user_id dari company yang melakukan pembayaran
            $table->integer('company_id');
            $table->string('type');
            $table->string('pricing_period');
            $table->string('status'); // status invoice (PENDING, PAID, dsb)
            $table->string('merchant_name');
            $table->string('merchant_profile_picture_url')->nullable();
            $table->decimal('amount', 15, 2); // Jumlah uang yang akan ditagihkan
            $table->string('payer_email');
            $table->text('description')->nullable(); // Deskripsi invoice
            $table->timestamp('expiry_date')->nullable(); // Tanggal kadaluarsa
            $table->string('invoice_url'); // URL invoice dari Xendit
            $table->decimal('paid_amount', 15, 2)->nullable(); // Jumlah yang dibayar saat sukses
            $table->string('bank_code')->nullable(); // Bank yang digunakan untuk transfer
            $table->timestamp('paid_at')->nullable(); // Waktu pembayaran
            $table->decimal('fees_paid_amount', 15, 2)->nullable(); // Biaya yang dibayarkan
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_invoices');
    }
}
