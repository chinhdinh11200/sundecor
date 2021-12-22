<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_product', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('bill_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('sell_price', 10, 3)->nullable();
            $table->decimal('sale_price', 10, 3)->nullable();
            $table->timestamps();
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');
            $table->foreign('bill_id')
                    ->references('id')
                    ->on('bills')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_product');
    }
}
