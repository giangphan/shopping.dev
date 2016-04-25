<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DonHang;

class KhachHang extends Model
{
    protected $table = 'khachhang';

    protected $fillable = ['tenKhachHang','soDienThoai'];

    public $timestamps = false;

    public function donhang() {
        return $this->belongsTo(DonHang::class);
    }
}
