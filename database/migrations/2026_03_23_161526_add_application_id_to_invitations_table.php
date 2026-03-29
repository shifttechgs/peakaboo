<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Column was added via 2026_03_27_154929_add_application_id_to_invitations_table_fix
    public function up(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            //
        });
    }

    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            //
        });
    }
};
