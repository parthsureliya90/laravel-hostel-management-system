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
        Schema::create('fees_register', function (Blueprint $table) {
            $table->id();
            $table->integer('recipet_no')->comment('Fees Recipet No.');
            $table->integer('sid')->comment('Student ID');
            $table->integer('batch_id')->comment('Student Batch Table ID');
            $table->float('amount')->comment('paid Amount');
            $table->date('paid_date')->comment('Fees paid Date');
            $table->enum('verified_with_bank', ['YES', 'NO'])->default('NO')->comment('Amount is Verified with bank or not');
            $table->enum('fees_type', ['JOINING', 'INSTALLMENT'])->default('INSTALLMENT')->comment('Joining fees or Installment fees');
            $table->string('added_by')->comment('fees installment or joining recoreded by');
            $table->enum('firm', ['ARADHANA', 'GANDHIDHAM'])->default('FIRMONE')->comment('Fees Amount is credited in this Account');
            $table->text('remarks')->nullable()->comment('Paid by CASH / CHEQUE / UPI / OTHERS');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_register');
    }
};
