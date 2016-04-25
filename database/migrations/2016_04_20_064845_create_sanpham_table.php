<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('don_hang_id')->unsigned()->index();
            $table->foreign('don_hang_id')->references('id')->on('donhang')->onDelete('cascade');
            $table->string('tenSanPham');
            $table->smallInteger('soLuong')->unsigned();
            $table->string('ghiChuSanPham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sanpham');
    }
}
