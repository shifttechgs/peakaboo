<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('leads')->where('status', 'enrolled')->update(['status' => 'converted']);
    }

    public function down(): void
    {
        DB::table('leads')->where('status', 'converted')->update(['status' => 'enrolled']);
    }
};

