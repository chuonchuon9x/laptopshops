@extends('admin_layout')
@section('admin_content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Thông Tin Đơn Hàng Chi Tiết</strong>
        </div>
        <div class="card-body">
            @foreach ($order_by_id as $order)
            {{ dd($order_by_id) }}
                <table  class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ giao hàng</th>
                            <th>Tên sản phẩm</th>
                            <th>Tổng giá tiền</th>
                            {{-- <th>Lựa Chọn</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->customer_phone }}</td>
                                <td>{{ $order->shipping_address }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->order_total }}</td>
                                {{-- <td><button type="submit" class="btn btn-outline-secondary btn-sm"><i class="fa fa-pencil"></i>&nbsp; Đã Xử Lý</button></td> --}}
                            </tr>
                    </tbody>
                </table>
            @endforeach
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

@endsection
