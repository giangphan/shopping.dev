@extends('layouts.admin')

@push('head')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/datatables.min.css') }}"/>
@endpush

@section('page-head')
<h3>
    Danh sách đơn hàng
</h3>
<span class="sub-title">Welcome to Shopping Dashboard</span>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-body">
                <table id="OrderList" class="table table-hover dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Ngày giao</th>
                            <th>TT</th>
                            <th>Ghi chú</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/t/bs/dt-1.10.11,af-2.1.1,b-1.1.2,b-print-1.1.2,r-2.0.2,sc-1.4.1,se-1.1.2/datatables.min.js"></script>
<script>
    function format ( d ) {
        var conlai = d.tongTien - d.traTruoc;
    // `d` is the original data object for the row
    var text = '<div class="row details-row"><div class="col-md-6"><p><b>Ngày đặt</b>: '+d.ngayDat+
    '</p><p><b>Ngày giao</b>: '+d.ngayGiao+'</div><div class="col-md-6"><p><b>Tổng tiền</b>: '+commaSeparateNumber(d.tongTien)+
    ' đ</p><p><b>Còn lại</b>: '+commaSeparateNumber(conlai)+
    ' đ</p></div><div class="col-md-6"><p><b>Thời gian tạo ĐH</b>: ' + d.created_at +
    '</p></div><div class="col-md-6"><p><b>Thời gian cập nhật cuối</b>: ' + d.updated_at +
    '</p></div></div>';
    text += '<div class="col-xs-12 col-md-10 col-md-offset-1"><table cellspacing="0" class="table table-bordered">'+
    '<thead><tr><th>Sản phẩm</th><th>Số lượng</th><th>Ghi chú</th></tr></thead>';
    for (i = 0; i < d.sanpham.length; i++) {
        text += '<tr><td>'+d.sanpham[i].tenSanPham+'</td>'+
        '<td>'+d.sanpham[i].soLuong+'</td>'+
        '<td>'+d.sanpham[i].ghiChuSanPham+'</tr>';
    }
    text +='</table></div>';
    return text;
}

function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + '.' + '$2');
    }
    return val;
}

function insertATag(val) {
    return '<a class="edit-order-row" href="#" data-id="'+val+'"><i class="fa fa-edit"></i></a>';
}

function insertModalTag(val) {
    return '<a class="edit-tinhtrang-row" href="#">'+val+'</a>';
}

$(function() {
    var table = $('#OrderList').DataTable({
        ajax: "{!! route('getGiaoTrongNgayData') !!}",
        "language": {
            "lengthMenu": "Hiện _MENU_ dòng mỗi trang",
            "zeroRecords": "Opps !!! Không có dữ liệu trùng khớp",
            "info": "Hiển thị trang _PAGE_ trong _PAGES_",
            "infoEmpty": "Không có dữ liệu",
            "search":         "Lọc:",
            "thousands":      ".",
            "infoFiltered": "(Kết quả lọc từ _MAX_ dữ liệu)",
            "paginate": {
                "first":      "First",
                "last":       "Last",
                "next":       "Next",
                "previous":   "Prev"
            },
        },
        ordering: false,
        columns: [
        {
            "className":      'details-control',
            "orderable":      false,
            "data":           null,
            "defaultContent": ''
        },
        { data: 'maDonHang', name: 'maDonHang',className:'col-id' },
        { data: 'khachhang.tenKhachHang', name: 'khachHang' },
        { data: 'diaChi', name: 'diaChi' },
        { data: 'khachhang.soDienThoai', name: 'soDienThoai' },
        { data: 'ngayGiao', name: 'ngayGiao'},
        {
            "className": 'tinh-trang-control',
            "data": 'trangthai.tinhtrang',
            "name": 'trangThai'
        },
        { data: 'ghiChuDonHang', name: 'ghiChu'},
        { data :'id' },
        ],

        "columnDefs": [
        {
            "render": function (data, type, row) {
                return insertATag(data);
            },
            "targets": [8]
        },
        {
            "render": function (data, type, row) {
                return insertModalTag(data);
            },
            "targets": [6]
        },
        ],
    });
});

$(document).ready(function () {
    $('#OrderList tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = $('#OrderList').DataTable().row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
    $('#OrderList tbody').on('click', 'td.tinh-trang-control', function () {
        var id = $(this).closest('td.id').val();
        alert(id);
    });
});
</script>
@endpush