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
        Schema::create('rooms_master', function (Blueprint $table) {
            $table->id();
            $table->integer('building_id')->comment('HOSTEL BUILDING ID');
            $table->string('room_no', 150);
            $table->enum('status', ['VISIBLE', 'HIDDEN'])->default('HIDDEN');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms_master');
    }
};
