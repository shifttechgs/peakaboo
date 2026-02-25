<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();       // TOUR-2026-001
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('child_name');
            $table->string('child_nickname')->nullable();
            $table->string('child_age');                 // '1-3 years' etc.
            $table->date('preferred_date');
            $table->string('preferred_time');            // '09:00', '11:00', '14:00'
            $table->text('message')->nullable();
            $table->string('source')->nullable();        // google, facebook, instagram, referral, other
            $table->string('status')->default('new');    // new, contacted, tour_scheduled, tour_completed, converted, waitlist, lost
            $table->text('notes')->nullable();           // admin internal notes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
