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
        Schema::table('leads', function (Blueprint $table) {
            $table->date('follow_up_date')->nullable()->after('notes');
            $table->timestamp('last_activity_at')->nullable()->after('follow_up_date');
            $table->timestamp('converted_at')->nullable()->after('last_activity_at');
            $table->timestamp('tour_scheduled_at')->nullable()->after('converted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->dropColumn(['follow_up_date', 'last_activity_at', 'converted_at', 'tour_scheduled_at']);
        });
    }
};
