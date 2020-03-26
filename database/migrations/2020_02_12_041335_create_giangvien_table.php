<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiangvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giangvien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idusers');
            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');
            $table->string('ho',255)->nullable();
            $table->string('ten',255)->nullable();
            $table->tinyInteger('gioitinh')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('quequan',255)->nullable();
            $table->string('diachi',255)->nullable();
            $table->integer('sodt')->nullable();
            $table->string('noitotnghiep')->nullable();
            $table->string('bangcap')->nullable();
            $table->string('quanham')->nullable();
            $table->unsignedBigInteger('idbomon')->nullable();
            $table->foreign('idbomon')->references('id')->on('bomons')->onDelete('cascade');
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
        Schema::dropIfExists('giangvien');
    }
}
