<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable()->unique();
            $table->enum('delivery_option',['dine-in','delivery']);
            $table->string('orderer_name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->decimal('total_price', 15,2);
            $table->enum('payment_option',['tunai','non-tunai'])->default('non-tunai');
            $table->enum('status_pembayaran', ['pending','capture'])->default('pending');
            $table->enum('status', ['Menunggu Diproses', 'Sedang Diproses', 'Selesai', 'Sedang Diantar'])->default('Menunggu Diproses');
            $table->string('checkout_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
