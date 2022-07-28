<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->foreignId('unit_id')->constrained();
            $table->double('price');
            $table->double('final_price');
            // $table->double('offer')->nullable();
            // $table->boolean('is_discount')->default(false);
            // $table->double('special_price');
            $table->boolean('is_featured')->default(false);
            $table->boolean('product_status')->default(true);
            $table->longText('description')->nullable();
            $table->string('featured_image');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->boolean('visibility')->default(true);
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
        Schema::dropIfExists('products');
    }
}
