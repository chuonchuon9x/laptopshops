@extends('admin_layout')
@section('admin_content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Danh Sách Đơn Hàng</strong>
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
                        <th>Tên người đặt hàng</th>
                        <th>Tổng giá tiền</th>
                        <th>Tình trạng đơn hàng</th>
                        {{-- <th>Hiện thị</th> --}}
                        <th>Lựa Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_order as $key => $order)
                        <tr>
                            <td>{{ ($order->customer_name) }}</td>
                            <td>{{ ($order->order_total) }}</td>
                            <td>
                            @if ($order->order_status == 1)
                                {{ 'Chưa Xử Lý' }}
                            @else
                                {{ 'Đã Xử Lý' }}
                            @endif</td>
                            <td>
                                <a href="{{ URL::to('/view-order/'.$order->order_id) }}"><button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-pencil"></i>&nbsp; Xem</button></a>
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
