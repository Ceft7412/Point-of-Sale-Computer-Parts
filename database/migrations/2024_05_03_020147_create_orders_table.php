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
        Schema::create('orders_table', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->unique();
            $table->foreignId('customer_id');
            $table->foreignId('user_id');
            $table->integer('order_status');
            $table->integer('order_total');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_table');
    }
};
