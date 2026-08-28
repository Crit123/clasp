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
    Schema::create('room_availability', function (Blueprint $table) {
        $table->id();
        $table->foreignId('room_id')->constrained()->cascadeOnDelete();
        $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
        $table->time('start_time');
        $table->time('end_time');
        $table->boolean('is_blocked')->default(false);
        $table->string('block_reason')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_availability');
    }
};
