@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Danh sach đơn hàng</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            </nav>
        </div>
    </div>
    @include('backend.messages.messages')
    <div class="card">
        <div class="card-body">
            <h4>Tất cả đơn hàng</h4>
            <div class="m-t-25">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người mua</th>
                            <th>Tổng tiền</th>
                            <th>HÌnh thức thanh toán </th>
                            <th>Tình trạng</th>
                            <th>Xem</th>
                            <th>Xoá đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( count($records) > 0)
                            @foreach( $records as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Order_delivery->name }}</td>
                                <td>{{ number_format($item->total) }}</td>
                                <td>{{ ($item->paymod == 0) ?'Tại cửa hàng':'GHN' }}</td>
                                <td>{{ ($item->status == 0) ? "Chưa xác nhận" : "Đã xác nhận"}}</td>
                                <td><a href="{{ route('order_detail_view', $item->id) }}">Chi tiết</a></td>
                                <td><a href="{{ route('delete_order', $item->id) }}">Xoá</a></td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                {{ $records->links() }}
            </div>
        </div>
    </div>
</div>
@endsection