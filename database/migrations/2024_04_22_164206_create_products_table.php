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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('product_name')->required()->unique();
            $table->decimal('product_price', 8, 2)->required();
            $table->string('product_image')->required();
            $table->integer('product_quantity')->default(0);
            $table->foreignId('subcategory_id');
            $table->foreignId('category_id');
            $table->boolean('is_active')->default(true);
            $table->foreign('category_id')->references('category_id')->on('subcategories')->onUpdate('cascade');
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
