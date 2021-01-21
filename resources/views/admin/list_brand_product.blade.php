@extends('admin_layout')
@section('admin_content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh Sách Thương Hiệu</strong>
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
                                    <th>Tên Thương Hiệu Sản Phẩm</th>
                                    <th>Mô Tả</th>
                                    <th>Hiển Thị</th>
                                    <th>Lựa Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_brand_product as $key => $lcp)
                                    <tr>
                                        <td>{{ ($lcp->brand_name) }}</td>
                                        <td>{{ ($lcp->brand_desc) }}</td>
                                        <td>
                                            <?php 
                                                if ($lcp->brand_status == 0) {
                                            ?>
                                                <a href="{{URL::to ('/active-brand-product/'.$lcp->brand_id) }}"><button type="submit" class="btn btn-outline-warning"><i class="fa fa-thumbs-o-down"></i>&nbsp; Ẩn</button></a>
                                                <a href="{{URL::to ('/unactive-brand-product/'.$lcp->brand_id) }}"><button type="submit" class="btn btn-outline-success"><i class="fa fa-fa-thumbs-o-up"></i>&nbsp; Hiển thị</button></a>
                                            <?php
                                                } elseif ($lcp->brand_status == 1) {
                                            ?>
                                                <a href="{{URL::to ('/active-brand-product/'.$lcp->brand_id) }}"><button type="submit" class="btn btn-outline-warning"><i class="fa fa-thumbs-o-down"></i>&nbsp; Ẩn</button></a>
                                            <?php
                                                } else {
                                            ?>
                                                <a href="{{URL::to ('/unactive-brand-product/'.$lcp->brand_id) }}"><button type="submit" class="btn btn-outline-success"><i class="fa fa-thumbs-o-up"></i>&nbsp; Hiển thị</button></a>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('/edit-brand-product/'.$lcp->brand_id) }}"><button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-pencil"></i>&nbsp; Sửa</button></a>
                                            <a href="{{ URL::to('/delete-brand-product/'.$lcp->brand_id) }}"><button onclick="return confirm('Bạn muốn xoá thương hiệu này ?')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp;Xoá</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

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
