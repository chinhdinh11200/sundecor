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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('title');
            $table->text('description');
            $table->text('content');
            $table->text('specifications')->nullable();
            $table->decimal('sell_price', 10, 3);
            $table->decimal('sale_price', 10, 3)->nullable();
            $table->string('material')->nullable();
            $table->string('size')->nullable();
            $table->string('guarantee')->nullable();
            $table->boolean('status');
            $table->boolean('sold_out');   // bán hết
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->boolean('is_contact_product')->nullable();
            $table->boolean('is_sale_in_month')->nullable();
            $table->boolean('is_hot_product')->nullable();
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
