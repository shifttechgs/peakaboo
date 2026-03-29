<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();          // APP-2026-001
            $table->string('status')->default('pending');   // pending, under_review, approved, waitlist, rejected

            // Program (Step 1)
            $table->date('start_date');
            $table->string('program');                      // baby-room, toddlers, preschool, grade-r
            $table->string('program_name');
            $table->string('fee_option');                   // monthly, termly, annually
            $table->string('fee_option_name');
            $table->boolean('snack_box')->default(false);

            // Child (Step 2) — indexed for search
            $table->string('child_name');
            $table->string('child_nickname')->nullable();
            $table->date('child_dob');
            $table->string('child_gender');
            $table->string('child_id_number')->nullable();
            $table->string('child_language')->nullable();

            // Primary parent contact — indexed for search / communication
            $table->string('mother_name');
            $table->string('mother_email');
            $table->string('mother_cell');
            $table->string('father_name')->nullable();
            $table->string('father_email')->nullable();
            $table->string('father_cell')->nullable();

            // Full validated form data — everything else stored here
            $table->json('form_data');

            // Documents: { birth_certificate: "enrolments/APP-2026-001/...", ... }
            $table->json('documents')->nullable();
            $table->string('pdf_path')->nullable();

            // CRM linkage (null if not from a lead)
            $table->foreignId('lead_id')->nullable()->constrained('leads')->nullOnDelete();

            // Admin management
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamp('invited_at')->nullable();

            // Set when parent registers via invite
            $table->foreignId('parent_user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
