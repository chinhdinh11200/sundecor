<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_new', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('news_id');
            $table->unsignedInteger('menu_id');
            $table->Integer('priority');
            $table->timestamps();
            $table->foreign('news_id')
                    ->references('id')
                    ->on('news')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('menu_new');
    }
}
