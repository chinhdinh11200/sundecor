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
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->text('description')->nullable();
            $table->integer('priority')->nullable();
            $table->boolean('status')->nullable();
            $table->text('content_1')->nullable();
            $table->text('content_2')->nullable();
            $table->string('images')->nullable();
            $table->integer('menu_type_id')->unsigned();
            $table->integer('parent_menu_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('menu_type_id')
                    ->references('id')
                    ->on('menu_types')
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
