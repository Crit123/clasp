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
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->string('school_year');
        $table->enum('semester', ['1st', '2nd', 'summer']);
        $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
        $table->enum('status', ['draft', 'under_review', 'approved', 'published'])->default('draft');
        $table->foreignId('generated_by')->nullable()->constrained('users')->nullOnDelete();
        $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamp('approved_at')->nullable();
        $table->timestamp('published_at')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
