<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->string('keyword');
            $table->text('description');
            $table->tinyInteger('priority');
            $table->boolean('status');
            $table->text('content');
            $table->string('images');
            $table->unsignedInteger('menu_id');
            $table->timestamps();
            $table->foreign('menu_id')
                    ->references('id')
                    ->on('menus')
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
        Schema::dropIfExists('news');
    }
}
