<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('hotline')->nullable();
            $table->string('receiveEmail')->nullable();
            $table->string('facebook')->nullable();
            $table->text('reason')->nullable();
            $table->text('address')->nullable();
            $table->text('tutorial')->nullable();
            $table->text('promotion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_infos');
    }
}
