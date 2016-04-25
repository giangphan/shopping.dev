<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('don_hang_id')->unsigned()->index();
            $table->foreign('don_hang_id')->references('id')->on('donhang')->onDelete('cascade');
            $table->string('tenKhachHang',40);
            $table->string('soDienThoai',40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('khachhang');
    }
}
