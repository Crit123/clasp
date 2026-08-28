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
    Schema::create('schedule_entries', function (Blueprint $table) {
        $table->id();
        $table->foreignId('schedule_id')->constrained()->cascadeOnDelete();
        $table->foreignId('section_id')->constrained();
        $table->foreignId('subject_id')->constrained();
        $table->foreignId('faculty_id')->constrained('faculty');
        $table->foreignId('room_id')->constrained();
        $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
        $table->time('start_time');
        $table->time('end_time');
        $table->boolean('has_conflict')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_entries');
    }
};
