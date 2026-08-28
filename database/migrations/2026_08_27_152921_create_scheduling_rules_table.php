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
    Schema::create('scheduling_rules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
        $table->integer('max_classes_per_day')->default(4);
        $table->integer('min_break_minutes')->default(30);
        $table->integer('max_consecutive_hours')->default(3);
        $table->json('allowed_days')->nullable();
        $table->time('earliest_start')->default('07:00:00');
        $table->time('latest_end')->default('21:00:00');
        $table->boolean('is_global')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduling_rules');
    }
};
