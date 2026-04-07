<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('children', function (Blueprint $table) {
            // Drop the existing FK, make nullable, re-add FK with nullOnDelete
            $table->dropForeign(['parent_user_id']);
            $table->foreignId('parent_user_id')->nullable()->change();
            $table->foreign('parent_user_id')->references('id')->on('users')->nullOnDelete();
        });

        // Fix any rows that somehow got 0 (shouldn't exist due to FK, but just in case)
        \Illuminate\Support\Facades\DB::table('children')
            ->where('parent_user_id', 0)
            ->update(['parent_user_id' => null]);
    }

    public function down(): void
    {
        Schema::table('children', function (Blueprint $table) {
            $table->dropForeign(['parent_user_id']);
            $table->foreignId('parent_user_id')->nullable(false)->change();
            $table->foreign('parent_user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }
};

