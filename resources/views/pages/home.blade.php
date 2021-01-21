@extends('layout')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section-title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Sản phẩm mới</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-1 custom-dots"></div>
                    </div>
                </div>
            </div>
            <!-- /section-title -->

            <!-- banner -->
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="banner banner-2">
                    <img src="{{ URL::to('public/frontend/img/logolaptop.jpg') }}" alt="">
                </div>
            </div>
            <!-- /banner -->

            <!-- Product Slick -->
            <div class="col-md-9 col-sm-6 col-xs-6">
                <div class="row">
                    <div id="product-slick-1" class="product-slick">
                        <!-- Product Single -->
                        @foreach ($list_product as $list)
                            <div class="product product-single">
                                <a href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}">
                                    <div class="product-thumb">
                                        <img src="{{ URL::to('public/uploads/product/'.$list->product_image) }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">{{ number_format($list->product_price).' '.'VNĐ' }} </h3>
                                        <h2 class="product-name"><a href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}">{{ $list->product_name }}</a></h2>
                                        <div class="product-btns">
                                            <a class="primary-btn add-to-cart" href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        <!-- /Product Single -->
                    </div>
                </div>
            </div>
            <!-- /Product Slick -->
        </div>

        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Tất Cả Sản Phẩm</h2>
                    <div class="pull-right">
                        <div class="product-slick-dots-2 custom-dots">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section title -->

            <!-- Product Single -->
            @foreach ($list_product as $list)
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="row">
                        <div class="product product-single">
                            <div class="product product-single">
                                <a href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}">
                                    <div class="product-thumb">
                                        <img src="{{ URL::to('public/uploads/product/'.$list->product_image) }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-price">{{ number_format($list->product_price).' '.'VNĐ' }} </h3>
                                        <h2 class="product-name"><a href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}">{{ $list->product_name }}</a></h2>
                                        <div class="product-btns">
                                            <a class="primary-btn add-to-cart" href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- <form>
                                @csrf
                            <input type="hidden" value="{{ $list->product_id }}" class="cart_product_id_{{ $list->product_id }}">
                            <input type="hidden" value="{{ $list->product_name }}" class="cart_product_name_{{ $list->product_id }}">
                            <input type="hidden" value="{{ $list->product_image }}" class="cart_product_image_{{ $list->product_id }}">
                            <input type="hidden" value="{{ $list->product_price }}" class="cart_product_price_{{ $list->product_id }}">
                            <input type="hidden" value="1" class="cart_product_qty_{{ $list->product_id }}">
                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$list->product_id) }}">
                                <div class="product-thumb">
                                    <img src="{{ URL::to('public/uploads/product/'.$list->product_image) }}" height="250" width="250" alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">{{ number_format($list->product_price).' '.'VNĐ' }}</h3>
                                    <h2 class="product-name">{{ $list->product_name }}</h2>
                            </a>
                                    <div class="product-btns">
                                        <button class="primary-btn add-to-cart" data-id_product="{{ $list->product_id }}" name="add-to-cart"><i class="fa fa-shopping-cart"></i> Thêm Giỏ Hàng</button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- /Product Single -->
        </div>
        <div class="row" style="float: right">
            <nav aria-label="Page navigation example">
                {!! $list_product->links() !!}
            </nav>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection