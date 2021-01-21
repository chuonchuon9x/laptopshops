@extends('admin_layout')
@section('admin_content')
<div class="card">
    <div class="card-header">
        <strong>Thêm Thương Hiệu</strong> Sản Phẩm
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
        <form action="{{URL::to ('/save-brand-product') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}
            {{-- <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Username</p>
                </div>
            </div> --}}
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Thương Hiệu Sản Phẩm</label></div>
                <div class="col-12 col-md-9"><input type="text"  id="text-input" name="brand_product_name" placeholder="Tên thương hiệu sản phẩm" class="form-control"></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Thương Hiệu Sản Phẩm</label></div>
                <div class="col-12 col-md-9"><textarea style="resize: none" name="brand_product_desc" id="ckeditor" rows="5" placeholder="Mô tả thương hiệu Sản Phẩm" class="form-control"></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Hiển Thị</label></div>
                <div class="col-12 col-md-9">
                    <select name="brand_product_status" id="select" class="form-control">
                        <option value="0">Lựa Chọn</option>
                        <option value="1">Ẩn</option>
                        <option value="2">Hiển Thị</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"></div>
                <div class="col col-md-6">
                    <button type="submit" name="add_category_product" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Thêm Danh Mục</button>
                </div>
                <div class="col col-md-3"></div>
            </div>
        </form>
    </div>
</div>
@endsection