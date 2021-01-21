@extends('admin_layout')
@section('admin_content')
<div class="card">
    <div class="card-header">
        <strong>Thêm</strong> Sản Phẩm
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
        <form action="{{URL::to ('/save-product') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            {{-- <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Username</p>
                </div>
            </div> --}}
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Sản Phẩm</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="product_name" placeholder="Tên sản phẩm" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giá Sản Phẩm</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="product_price" placeholder="Giá sản phẩm" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Hình Ảnh Sản Phẩm</label></div>
                <div class="col-12 col-md-9"><input type="file" id="text-input" name="product_image" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô Tả Sản Phẩm</label></div>
                <div class="col-12 col-md-9"><textarea style="resize: none" name="product_desc" id="ckeditor1" rows="5" placeholder="Mô tả Sản Phẩm" class="form-control"></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nội Dung Sản Phẩm</label></div>
                <div class="col-12 col-md-9"><textarea style="resize: none" name="product_content" id="ckeditor" rows="5" placeholder="Nội Dung Sản Phẩm" class="form-control"></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Danh Mục Sản Phẩm</label></div>
                <div class="col-12 col-md-9">
                    <select name="product_cate" id="select" class="form-control">
                        @foreach ($cate_product as $cate)
                            <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Thương Hiệu Sản Phẩm</label></div>
                <div class="col-12 col-md-9">
                    <select name="product_brand" id="select" class="form-control">
                        @foreach ($brand_product as $brand)
                            <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Hiển Thị</label></div>
                <div class="col-12 col-md-9">
                    <select name="product_status" id="select" class="form-control">
                        <option value="0">Lựa Chọn</option>
                        <option value="1">Ẩn</option>
                        <option value="2">Hiển Thị</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col col-md-6">
                    <button type="submit" name="add_product" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Thêm Sản Phẩm</button>
                </div>
                <div class="col col-md-3"></div>
            </div>
        </form>
    </div>
</div>
@endsection