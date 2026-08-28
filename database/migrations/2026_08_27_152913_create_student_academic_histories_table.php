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
    Schema::create('student_academic_histories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained()->cascadeOnDelete();
        $table->foreignId('subject_id')->constrained();
        $table->string('school_year');
        $table->enum('semester', ['1st', '2nd', 'summer']);
        $table->decimal('grade', 4, 2)->nullable();
        $table->enum('status', ['passed', 'failed', 'inc', 'dropped'])->default('passed');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_academic_histories');
    }
};
