<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DonHang;
use App\SanPham;
use App\KhachHang;
use App\LoaiSanPham;
use App\ChiTietDonHang;
use Datatables;

class OrderController extends Controller
{
    //
    public function index(){
        return view('admin.order.list');
    }

    public function viewAdd() {
        return view('admin.order.add');
    }

    public function viewEdit(DonHang $order) {
        $order->load('khachhang','trangthai','sanpham');
        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $re, DonHang $order) {
        $order->khachhang->update($re->all());
        foreach($order->sanpham as $product)
            $product->update($re->all());
        // $order->sanpham->update($re->all());
        $order->update($re->all());
        return back();
    }

    public function viewGiaoTrongNgay() {
        return view('admin.order.giaotrongngay');
    }

    public function ThemDonHang(Request $re) {
        $order = new DonHang;
        $order->maDonHang = $re->maDonHang;
        $order->diaChi = $re->diaChi;
        $order->ngayDat = $re->ngayDatHang;
        $order->ngayGiao = $re->ngayGiaohang;
        $order->tongTien = $re->tongTien;
        $order->traTruoc = $re->traTruoc;
        $order->ghiChuDonHang = $re->ghiChuDonHang;
        $order->tinhTrangDonHang = 1;
        $order->save();

        $kh = new KhachHang;
        $kh->tenKhachHang = $re->tenKhachHang;
        $kh->soDienThoai = $re->soDienThoai;
        $order->khachhang()->save($kh);

        $sanPham = $re->sanPham;
        $soLuong = $re->soLuong;
        $ghiChu = $re->ghiChuSanPham;
        foreach( $sanPham as $cot => $sp  ){
            $product = new SanPham;
            $product->tenSanPham = $sp;
            $product->soLuong = $soLuong[$cot];
            $product->ghiChuSanPham = $ghiChu[$cot];
            $order->sanpham()->save($product);
        }
    }

    public function getOrderListData() {
        $order = DonHang::with('sanpham', 'khachhang', 'trangthai')->orderBy('id', 'desc')->get();
        return Datatables::of($order)->make(true);
    }

    public function getGiaoTrongNgayData() {
        $gmt7 = "7" * 60 * 60;
        $today = gmdate("Y-m-d", time() + $gmt7);
        $order = DonHang::with('sanpham', 'khachhang', 'trangthai')->where('ngayGiao', '=', $today)->get();
        return Datatables::of($order)->make(true);
    }
}
