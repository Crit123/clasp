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
    Schema::create('subjects', function (Blueprint $table) {
        $table->id();
        $table->foreignId('department_id')->constrained()->cascadeOnDelete();
        $table->string('code')->unique();
        $table->string('description');
        $table->decimal('units', 4, 1);
        $table->decimal('lecture_hours', 4, 1)->default(0);
        $table->decimal('lab_hours', 4, 1)->default(0);
        $table->decimal('required_hours_per_week', 4, 1);
        $table->enum('type', ['lecture', 'laboratory', 'both'])->default('lecture');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
