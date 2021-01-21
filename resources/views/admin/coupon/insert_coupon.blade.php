@extends('admin_layout')
@section('admin_content')
<div class="card">
    <div class="card-header">
        <strong>Thêm </strong> Mã Giảm Giá
    </div>
    <div class="card-body card-block">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
        @endif

        <?php 
                        $message = Session::get('message');
                        if ($message) {
                            # code...
                            echo '<div class="alert alert-primary" role="alert">',$message.'</div>';
                            Session::put('message', null);
                        }
        ?>
        <form action="{{URL::to ('/insert-coupon-code') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            {{-- <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Username</p>
                </div>
            </div> --}}
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Mã Giảm Giá</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="coupon_name" placeholder="Tên Mã Giảm Giá" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mã Giảm Giá</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="coupon_code" placeholder="Mã Giảm Giá" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số Lượng Mã Giảm Giá</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="coupon_time" placeholder="Số Lượng Mã Giảm Giá" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tính Năng Mã Giảm Giá</label></div>
                <div class="col-12 col-md-9">
                    <select name="coupon_condition" id="select" class="form-control">
                        <option value="0">Lựa Chọn</option>
                        <option value="1">Giảm Theo %</option>
                        <option value="2">Giảm Theo Tiền</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nhập Số % Hoặc Tiền Giảm</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="coupon_number" placeholder="Nhập Số % Hoặc Tiền Giảm" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col col-md-6">
                    <button type="submit" name="add_category_product" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Thêm Mã Giảm Giá</button>
                </div>
                <div class="col col-md-3"></div>
            </div>
        </form>
    </div>
</div>
@endsection