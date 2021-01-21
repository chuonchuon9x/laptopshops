@extends('admin_layout')
@section('admin_content')
<div class="card">
    <div class="card-header">
        <strong>Cập Nhật</strong> Sản Phẩm
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
        @foreach ($edit_category_product as $key => $value)
            <form action="{{URL::to ('/update-category-product/'.$value->category_id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                {{-- <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">Username</p>
                    </div>
                </div> --}}
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Danh Mục Sản Phẩm</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="category_product_name" placeholder="Tên danh mục sản phẩm" class="form-control" value="{{ $value->category_name }}"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả Danh Mục Sản Phẩm</label></div>
                    <div class="col-12 col-md-9"><textarea style="resize: none" name="category_product_desc" id="ckeditor" rows="5" placeholder="Mô tả Sản Phẩm" class="form-control">{{ $value->category_desc }}</textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"></div>
                    <div class="col col-md-6">
                        <button type="submit" name="update_category_product" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Cập Nhật Danh Mục</button>
                    </div>
                    <div class="col col-md-3"></div>
                </div>
            </form>
        @endforeach
    </div>
</div>
@endsection