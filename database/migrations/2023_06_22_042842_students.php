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
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('batch_id');
            $table->string('batch_name', 100);
            $table->integer('room_id')->nullable();
            $table->string('photo', 50)->nullable();
            $table->string('a_no', 50);
            $table->string('fname', 155);
            $table->string('mname', 155);
            $table->string('lname', 155);
            $table->string('father_contacts', 50);
            $table->string('emg_contacts', 50);
            $table->string('student_contacts', 50);
            $table->text('address', 155);
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])->nullable();
            $table->integer('college_id');
            $table->float('payable_fees', 12, 2)->default(00);
            $table->enum('fees_duration', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12']);
            $table->enum('is_fees_completed', ['YES', 'NO'])->default('NO');
            $table->enum('year', ['1st', '2nd', '3rd'])->nullable();
            $table->enum('cource', ['BCom', 'MCom', 'BCA', 'MCA', 'MBA', 'MSC(IT&CA)', 'BA', 'MA', 'PHd', 'BE/B.Tech', 'B.Arch', 'B.Sc', 'BPharma', 'BDS', 'B.Ed', 'M.Ed'])->nullable();
            $table->enum('status', ['VISIBLE', 'HIDDEN'])->default('HIDDEN');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
