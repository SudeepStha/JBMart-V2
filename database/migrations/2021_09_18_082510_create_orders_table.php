<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->date('shipping_date')->nullable();
            $table->time('shipping_time')->nullable();
            $table->double('total');
            $table->double('delivery_charge');
            $table->double('grand_total');
            $table->enum('order_status', ['Pending', 'Approved', 'Cancelled', 'Rejected']);
            $table->enum('delivery_status', ['Pending', 'Completed']);
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
        Schema::dropIfExists('orders');
    }
}
