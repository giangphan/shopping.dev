<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SanPham;
use App\KhachHang;
use App\TrangThai;

class DonHang extends Model
{
    protected $table = 'donhang';

    protected $fillable = ['maDonHang', 'diaChi', 'ngayDat', 'ngayGiao', 'tongTien', 'traTruoc', 'ghiChuDonHang', 'tinhTrangDonHang'];

    public $timestamps = true;

    public function sanpham() {
        return $this->hasMany(SanPham::class);
    }

    public function khachhang() {
        return $this->hasOne(KhachHang::class);
    }

    public function trangthai() {
        return $this->hasOne(TrangThai::class,'id','tinhTrangDonHang');
    }
}
