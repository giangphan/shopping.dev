<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('maDonHang',20);
            $table->string('diaChi');
            $table->date('ngayDat');
            $table->date('ngayGiao')->index();
            $table->integer('tongTien')->unsigned();
            $table->integer('traTruoc')->unsigned();
            $table->text('ghiChuDonHang');
            $table->integer('tinhTrangDonHang')->unsigned();
            $table->timestamps();
        });

        Schema::table('donhang', function ($table){
            $table->foreign('tinhTrangDonHang')->references('id')->on('trangthai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donhang');
    }
}
