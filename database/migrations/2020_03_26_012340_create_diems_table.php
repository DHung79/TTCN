<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('cc')->nullable();
            $table->float('tx')->nullable();
            $table->float('gk')->nullable();
            $table->float('kt')->nullable();
            $table->unsignedBigInteger('idmonhoc');
            $table->foreign('idmonhoc')->references('id')->on('monhocs')->onDelete('cascade');
            $table->unsignedBigInteger('idgv');
            $table->foreign('idgv')->references('id')->on('giangvien')->onDelete('cascade');
            $table->unsignedBigInteger('idsv');
            $table->foreign('idsv')->references('id')->on('sinhvien')->onDelete('cascade');
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
        Schema::dropIfExists('diems');
    }
}
