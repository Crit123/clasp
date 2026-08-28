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
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('building')->nullable();
        $table->string('floor')->nullable();
        $table->integer('capacity')->default(40);
        $table->enum('type', ['lecture', 'laboratory', 'computer_lab', 'special'])->default('lecture');
        $table->boolean('has_projector')->default(false);
        $table->boolean('has_ac')->default(false);
        $table->boolean('has_computers')->default(false);
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
