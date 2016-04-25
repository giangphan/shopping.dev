@extends('layouts.admin')

@push('head')
<link href="{{ asset('public/assets/js/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" />
@endpush

@section('page-head')
<h3>
    Tạo đơn hàng
</h3>
<span class="sub-title">Welcome to Shopping Dashboard</span>
@endsection

@section('content')
<div class="row">
    <form action="" method="post" id="order_add">
        {!! csrf_field(); !!}
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="ian-card-title">THÔNG TIN ĐƠN HÀNG</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-4 form-group">
                        <label for="maDonHang">Mã biên nhận</label>
                        <input type="text" name="maDonHang" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="tenKhachHang">Tên khách hàng</label>
                        <input type="text" name="tenKhachHang" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="soDienThoai">Số điện thoại</label>
                        <input type="text" name="soDienThoai" class="form-control">
                    </div>
                    <div class="col-md-8 form-group">
                        <label for="diaChi">Địa chỉ giao hàng</label>
                        <input type="text" name="diaChi" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ngayDatHang">Ngày đặt hàng</label>
                        <input type="text" name="ngayDatHang" class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="tongTien">Tổng giá trị</label>
                        <input type="text" name="tongTien" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="traTruoc">Trả trước</label>
                        <input type="text" name="traTruoc" class="form-control">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="ngayGiaoHang">Ngày giao hàng</label>
                        <input type="text" name="ngayGiaohang" class="form-control" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="ghiChuDonHang">Ghi chú đơn hàng</label>
                        <textarea form="order_add" name="ghiChuDonHang" class="form-control "></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="ian-card-title">THÔNG TIN SẢN PHẨM</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div id="products">
                            <div class="product-form">
                                <div class="col-md-3 form-group">
                                    <div class="input-wrapper">
                                        <label for="sanPham_1">Sản phẩm</label>
                                        <input type="text" name="sanPham[]" id="sanPham_1" class="form-control">
                                        <span class="input-bar"></span>
                                    </div>
                                </div>
                                <div class="col-md-2 form-group">
                                    <div class="input-wrapper">
                                        <label for="soLuong">Số lượng</label>
                                        <input type="number" name="soLuong[]" class="form-control">
                                        <span class="input-bar"></span>
                                    </div>
                                </div>
                                <div class="col-md-7 form-group">
                                    <div class="input-wrapper">
                                        <label for="ghiChuSanPham">Ghi chú sản phẩm</label>
                                        <input type="text" name="ghiChuSanPham[]" class="form-control">
                                        <span class="input-bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-bar ">
                            <div class="col-md-12">
                                <button tabindex="-1" class="btn btn-success btn-function add-more pull-left">+</button>
                                <button tabindex="-1" class="btn btn-danger btn-function delete-row pull-left">-</button>
                                <button class="btn btn-info pull-right" type="submit"><i class="fa fa-cloud-download"></i> Lưu</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="{{ asset('public/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script>
    $(document).ready( function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#products"); //Fields wrapper
    var add_button      = $(".add-more"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        $(this).parent().find('.delete-row').show();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="product-form"> <div class="col-md-3 form-group"> <div class="input-wrapper"> <label for="sanPham_1">Sản phẩm</label> <input type="text" name="sanPham[]" id="sanPham_1" class="form-control"> <span class="input-bar"></span> </div> </div> <div class="col-md-2 form-group"> <div class="input-wrapper"> <label for="soLuong">Số lượng</label> <input type="number" name="soLuong[]" class="form-control"> <span class="input-bar"></span> </div> </div> <div class="col-md-7 form-group"> <div class="input-wrapper"> <label for="ghiChuSanPham">Ghi chú sản phẩm</label> <input type="text" name="ghiChuSanPham[]" class="form-control"> <span class="input-group-btn"> </span> </div> </div> </div>'); //add input box
        }
    });
    $('.delete-row').click(function(e){
        e.preventDefault();
        $('#products').find('.product-form:last-child').remove();
        x--;
        if(x == 1) $(this).hide();
    });
});

</script>
@endpush