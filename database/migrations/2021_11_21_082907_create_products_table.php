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
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->text('specifications');
            $table->decimal('sell_price', 10, 3);
            $table->decimal('sale_price', 10, 3);
            $table->string('material');
            $table->integer('size');
            $table->integer('guarantee');
            $table->boolean('status');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->boolean('is_contact_product');
            $table->boolean('is_sale_in_month');
            $table->boolean('is_hot_product');
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
