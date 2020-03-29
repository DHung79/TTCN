<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhvien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ho',255);
            $table->string('ten',255);
            $table->tinyInteger('gioitinh')->nullable();
            $table->date('ngaysinh')->nullable();
            $table->string('quequan',255)->nullable();
            $table->string('diachi',255)->nullable();
            $table->integer('sodt')->nullable();
            $table->year('nienkhoa')->nullable();
            $table->unsignedBigInteger('idusers');
            $table->foreign('idusers')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('idlop');
            $table->foreign('idlop')->references('id')->on('lop')->onDelete('cascade');
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
        Schema::dropIfExists('sinhvien');
    }
}
