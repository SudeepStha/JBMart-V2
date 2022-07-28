<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayslipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payslips', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date');
            $table->foreignId('user_id')->constrained();
            $table->date('from_date');
            $table->date('to_date');
            $table->double('total');
            $table->double('comission'); // This price will be deducted by JB Mart
            $table->double('delivery_charge'); // This price will be deducted by JB Mart
            $table->double('net_total');
            $table->longText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payslips');
    }
}
