<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "sanpham";

    protected $fillable = ['tenSanPham', 'soLuong', 'ghiChuSanPham'];

    public $timestamps = false;

    public function donhang() {
        return $this->belongsTo(DonHang::class);
    }
}
