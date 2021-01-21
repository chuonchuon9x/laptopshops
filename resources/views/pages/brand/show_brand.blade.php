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
                    @foreach ($brand_name as $name)
                    <h2 class="title">{{ 'Sản Phẩm Từ '.$name->brand_name }}</h2>
                    @endforeach
                </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            @foreach ($list_brand_product as $list)
            <a href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <img src="{{ URL::to('public/uploads/product/'.$list->product_image) }}" height="250" width="250" alt="">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">{{ number_format($list->product_price).' '.'VNĐ' }}</h3>
                            <h2 class="product-name"><a href="#">{{ $list->product_name }}</a></h2>
                            <div class="product-btns">
                                <a class="primary-btn add-to-cart" href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
            <!-- /Product Single -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection