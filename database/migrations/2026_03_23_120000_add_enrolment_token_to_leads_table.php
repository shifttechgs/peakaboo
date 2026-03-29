<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            // One-time token used to pre-fill the enrolment form and link the
            // application back to this lead. Cleared once the application is submitted.
            $table->string('enrolment_token', 64)->nullable()->unique()->after('lost_reason');
        });
    }

    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn('enrolment_token');
        });
    }
};

