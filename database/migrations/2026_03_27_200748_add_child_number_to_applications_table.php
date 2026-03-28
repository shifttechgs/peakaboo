<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();

            // Unique child identity — PBK-{INITIALS}-{NNNN}
            // This is also the EFT bank payment reference
            $table->string('child_number')->unique();

            // Identity
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->date('dob');
            $table->string('gender');
            $table->string('id_number')->nullable();
            $table->string('language')->nullable();

            // Documents: { birth_certificate: "path/...", ... }
            $table->json('documents')->nullable();

            // Links
            $table->foreignId('parent_user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('child_user_id')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
