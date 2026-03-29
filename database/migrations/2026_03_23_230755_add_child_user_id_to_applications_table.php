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
        if (!Schema::hasColumn('applications', 'child_user_id')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->unsignedBigInteger('child_user_id')->nullable();
                $table->foreign('child_user_id')->references('id')->on('users')->nullOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if (Schema::hasColumn('applications', 'child_user_id')) {
                $table->dropForeign(['child_user_id']);
                $table->dropColumn('child_user_id');
            }
        });
    }
};
