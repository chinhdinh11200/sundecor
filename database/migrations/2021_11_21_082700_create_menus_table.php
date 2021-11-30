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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('keyword');
            $table->text('description');
            $table->text('priority')->nullable();
            $table->boolean('status');
            $table->text('content_1');
            $table->text('content_2');
            $table->string('images')->nullable();
            $table->integer('menu_type_id')->unsigned();
            $table->integer('parent_menu_id')->unsigned();
            $table->timestamps();
            $table->foreign('menu_type_id')
                    ->references('id')
                    ->on('menutypes')
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
        Schema::dropIfExists('menus');
    }
}
