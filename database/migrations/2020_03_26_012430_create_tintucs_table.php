<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTintucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintucs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tieude');
            $table->string('tenkhongdau');
            $table->string('nd');
            $table->mediumText('tomtat');
            $table->integer('slide');
            $table->integer('thongbaochinh');
            $table->text('video')->nullable();
            $table->text('img')->nullable();
            $table->unsignedBigInteger('idlt');
            $table->foreign('idlt')->references('id')->on('loaitins')->onDelete('cascade');
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
        Schema::dropIfExists('tintucs');
    }
}
