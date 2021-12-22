<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->Integer('priority')->nullable();
            $table->foreign('subcategory_id')
                    ->references('id')
                    ->on('menus')
                    ->onDelete('cascade');
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
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
        Schema::dropIfExists('menu_product');
    }
}
