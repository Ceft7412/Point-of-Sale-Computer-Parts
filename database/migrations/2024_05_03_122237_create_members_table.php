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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('membership_id')->unique()->nullable();
            $table->string('membership_name')->nullable();
            $table->string('membership_email')->nullable();
            $table->string('membership_phone')->nullable();
            $table->integer('membership_card_number')->unique()->nullable();
            $table->integer('membership_discount')->default(10);
            $table->string('membership_status')->default('Pending');
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
