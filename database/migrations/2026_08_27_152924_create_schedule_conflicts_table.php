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
    Schema::create('schedule_conflicts', function (Blueprint $table) {
        $table->id();
        $table->foreignId('schedule_id')->constrained()->cascadeOnDelete();
        $table->foreignId('entry_a_id')->constrained('schedule_entries')->cascadeOnDelete();
        $table->foreignId('entry_b_id')->nullable()->constrained('schedule_entries')->nullOnDelete();
        $table->enum('conflict_type', [
            'faculty', 'room', 'section', 'time', 'capacity', 'availability'
        ]);
        $table->text('description');
        $table->enum('status', ['unresolved', 'resolved'])->default('unresolved');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_conflicts');
    }
};
