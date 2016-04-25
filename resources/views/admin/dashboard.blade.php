@extends('layouts.admin')


@section('page-head')
<h3>
    Dashboard
</h3>
<span class="sub-title">Welcome to Shopping Dashboard</span>
@endsection

@section('content')
<!--state overview start-->
                <div class="row state-overview">
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel purple">
                            <div class="symbol">
                                <i class="fa fa-send"></i>
                            </div>
                            <div class="value white">
                                <h1 class="timer" data-from="0" data-to="{{ $order }}"
                                    data-speed="1000">
                                    <!--320-->
                                </h1>
                                <p>Đơn hàng</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel ">
                            <div class="symbol purple-color">
                                <i class="fa fa-tags"></i>
                            </div>
                            <div class="value gray">
                                <h1 class="purple-color timer" data-from="0" data-to="{{ $product }}"
                                    data-speed="1000">
                                    <!--123-->
                                </h1>
                                <p>Sản phẩm</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel green">
                            <div class="symbol ">
                                <i class="fa fa-cloud-upload"></i>
                            </div>
                            <div class="value white">
                                <h1>
                                    {{ $total }}
                                </h1>
                                <p>Item Upload</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol green-color">
                                <i class="fa fa-bullseye"></i>
                            </div>
                            <div class="value gray">
                                <h1 class="green-color timer" data-from="0" data-to="2345"
                                    data-speed="3000">
                                    <!--2345-->
                                </h1>
                                <p>Unique Visit</p>
                            </div>
                        </section>
                    </div>
                </div>
                <!--state overview end-->
@endsection

