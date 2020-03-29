<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaitinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaitins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenloaitin');
            $table->string('tenkhongdau');
            $table->integer('menu');
            $table->integer('gioithieu');
            $table->unsignedBigInteger('idtl');
            $table->foreign('idtl')->references('id')->on('theloais')->onDelete('cascade');
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
        Schema::dropIfExists('loaitins');
    }
}
