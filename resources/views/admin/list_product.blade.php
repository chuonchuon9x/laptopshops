@extends('admin_layout')
@section('admin_content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Danh Sách Sản Phẩm</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <?php 
                        $message = Session::get('message');
                        if ($message) {
                            # code...
                            echo '<div class="alert alert-primary" role="alert">',$message.'</div>';
                            Session::put('message', null);
                        }
                ?>
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Hình Sản Phẩm</th>
                        <th>Danh Mục</th>
                        <th>Thương Hiệu</th>
                        <th>Hiển Thị</th>
                        <th>Lựa Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_product as $pro)
                        <tr>
                            <td>{{ ($pro->product_name) }}</td>
                            <td>{{ number_format($pro->product_price) }} VNĐ</td>
                            <td><img src="public/uploads/product/{{ $pro->product_image }}" height="100" width="100"></td>
                            <td>{{ ($pro->category_name) }}</td>
                            <td>{{ ($pro->brand_name) }}</td>
                            <td>
                                <?php   
                                    if ($pro->product_status == 0) {
                                ?>
                                    <a href="{{URL::to ('/active-product/'.$pro->product_id) }}"><button type="submit" class="btn btn-outline-warning"><i class="fa fa-thumbs-o-down"></i>&nbsp; Ẩn</button></a>
                                    <a href="{{URL::to ('/unactive-product/'.$pro->product_id) }}"><button type="submit" class="btn btn-outline-success"><i class="fa fa-fa-thumbs-o-up"></i>&nbsp; Hiển thị</button></a>
                                <?php
                                    } elseif ($pro->product_status == 1) {
                                ?>
                                    <a href="{{URL::to ('/active-product/'.$pro->product_id) }}"><button type="submit" class="btn btn-outline-warning"><i class="fa fa-thumbs-o-down"></i>&nbsp; Ẩn</button></a>
                                <?php
                                    } else {
                                ?>
                                    <a href="{{URL::to ('/unactive-product/'.$pro->product_id) }}"><button type="submit" class="btn btn-outline-success"><i class="fa fa-thumbs-o-up"></i>&nbsp; Hiển thị</button></a>
                                <?php
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="{{ URL::to('/edit-product/'.$pro->product_id) }}"><button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-pencil"></i>&nbsp; Sửa</button></a>
                                <a href="{{ URL::to('/delete-product/'.$pro->product_id) }}"><button onclick="return confirm('Bạn muốn xoá sản phẩm này ?')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp;Xoá</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

    <script src="{{ asset('public/backend/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('public/backend/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/init/datatables-init.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
  } );
</script>
@endsection
