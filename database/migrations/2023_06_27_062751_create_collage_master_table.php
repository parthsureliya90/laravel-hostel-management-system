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
        Schema::create('collage_master', function (Blueprint $table) {
            $table->id();
            $table->string('college_name', 150);
            $table->string('location', 150);
            $table->enum('status', ['VISIBLE', 'HIDDEN'])->default('HIDDEN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collage_master');
    }
};
