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
    Schema::create('enrollment_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('enrollment_id')->constrained()->cascadeOnDelete();
        $table->foreignId('subject_id')->constrained();
        $table->enum('status', ['enrolled', 'dropped'])->default('enrolled');
        $table->text('drop_reason')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_items');
    }
};
