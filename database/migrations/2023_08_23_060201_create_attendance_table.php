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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->integer('sid')->nullable()->comment('Studetn Table ID');
            $table->enum('type', ['0', '1', '2'])->default('1')->comment('0 = ABSENT | 1 = PRESENT | 2 = HOLIDAY');
            $table->date('attendance_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
