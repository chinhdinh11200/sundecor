<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('keyword');
            $table->text('description');
            $table->tinyInteger('priority');
            $table->boolean('status');
            $table->text('content_1');
            $table->text('content_2');
            $table->string('images');
            $table->unsignedInteger('menu_type_id');
            $table->unsignedInteger('parent_menu_id');
            $table->timestamps();
            // $table->foreign('menu_type_id')
            //         ->references('id')
            //         ->on('menu_types')
            //         ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
