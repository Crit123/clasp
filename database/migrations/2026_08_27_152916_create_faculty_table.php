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
    Schema::create('faculty', function (Blueprint $table) {
        $table->id();
        $table->string('employee_id')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('middle_name')->nullable();
        $table->foreignId('department_id')->constrained();
        $table->enum('employment_type', ['full-time', 'part-time'])->default('part-time');
        $table->decimal('max_hours_per_week', 4, 1)->default(12);
        $table->enum('preferred_schedule', ['morning', 'afternoon', 'evening', 'any'])->default('any');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty');
    }
};
