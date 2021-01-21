@extends('layout')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Danh Mục Sản Phẩm</h2>
                </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            @foreach ($list_product as $list)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <img src="{{ URL::to('public/uploads/product/'.$list->product_image) }}" height="250" width="250" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">{{ number_format($list->product_price).' '.'VNĐ' }}</h3>
                            <h2 class="product-name"><a href="#">{{ $list->product_name }}</a></h2>
                            <div class="product-btns">
                                <a class="primary-btn add-to-cart" ><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- /Product Single -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection