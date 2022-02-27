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
            $table->text('logo')->nullable();
            $table->text('banner_ad')->nullable();
            $table->text('site_name')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('title')->nullable();
            $table->text('sale')->nullable();
            $table->text('gift')->nullable();
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
        Schema::dropIfExists('web_infos');
    }
}
