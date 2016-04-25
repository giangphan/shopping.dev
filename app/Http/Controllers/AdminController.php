<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DonHang;
use App\SanPham;

class AdminController extends Controller
{
    public function dashboard() {
        $order = DonHang::count();
        $product = SanPham::sum('soLuong');
        $total = DonHang::sum('tongTien');
        return view('admin.dashboard')->with(['order'=>$order,'product' => $product, 'total' => $total]);
    }
}
