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
        Schema::create('business_info', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('hours')->nullable();
            $table->unsignedInteger('registration_fee')->default(500);
            $table->timestamps();
        });

        Schema::create('fee_structures', function (Blueprint $table) {
            $table->id();
            $table->string('label');           // e.g. "Half Day"
            $table->string('slug')->unique();  // e.g. "half_day"
            $table->string('description')->nullable(); // e.g. "06:00 – 12:00"
            $table->unsignedInteger('amount'); // in Rands
            $table->boolean('is_addon')->default(false);
            $table->boolean('active')->default(true);
            $table->unsignedTinyInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_structures');
        Schema::dropIfExists('business_info');
    }
};
