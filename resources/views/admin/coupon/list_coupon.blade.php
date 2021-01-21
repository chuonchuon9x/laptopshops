@extends('admin_layout')
@section('admin_content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh Sách Mã Giảm Giá</strong>
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
                                    <th>Tên Mã Giảm Giá</th>
                                    <th>Mã Giảm Giá</th>
                                    <th>Điều Kiện Mã Giảm Giá</th>
                                    <th>Số Lượng Mã Giảm Giá</th>
                                    <th>Số Tiền Giảm Giá</th>
                                    <th>Lựa Chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupon as $key => $cou)
                                    <tr>
                                        <td>{{ ($cou->coupon_name) }}</td>
                                        <td>{{ ($cou->coupon_code) }}</td>
                                        <td>
                                            <?php 
                                                if ($cou->coupon_condition == 1) {
                                            ?>
                                                Giảm theo %
                                            <?php
                                                } else {
                                            ?>
                                                Giảm theo tiền
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td>{{ ($cou->coupon_time) }}</td>
                                        <td>
                                            <?php 
                                                if ($cou->coupon_condition == 1) {
                                            ?>
                                                Giảm {{ $cou->coupon_number }} %
                                            <?php
                                                } else {
                                            ?>
                                                Giảm {{ $cou->coupon_number }} VNĐ
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="{{ URL::to('/delete-coupon/'.$cou->coupon_id) }}"><button onclick="return confirm('Bạn muốn xoá mã này ?')" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i>&nbsp;Xoá</button></a>
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
