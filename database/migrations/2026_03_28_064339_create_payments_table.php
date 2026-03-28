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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Who paid
            $table->foreignId('parent_user_id')->constrained('users')->cascadeOnDelete();

            // What it's for — prefer child_id when the child record exists
            $table->foreignId('child_id')->nullable()->constrained('children')->nullOnDelete();
            $table->foreignId('application_id')->nullable()->constrained('applications')->nullOnDelete();

            // Payment details (parent-entered)
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->string('reference', 100);   // EFT reference used (e.g. PBK-BAT-0001)
            $table->char('month_year', 7);       // '2026-03' — for per-month balance queries

            // POP file
            $table->string('pop_path');

            // Workflow
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending')->index();
            $table->text('admin_note')->nullable();
            $table->foreignId('verified_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('verified_at')->nullable();

            $table->timestamps();

            // Composite index for fast parent balance lookups
            $table->index(['parent_user_id', 'month_year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
