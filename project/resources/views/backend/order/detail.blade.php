@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Đơn hàng</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            </nav>
        </div>
    </div>
    @include('backend.messages.messages')
    <div class="card">
        <div class="card-body">
            <h4>Đơn hàng</h4>
            <div class="m-t-25">
                <p>ID: {{ $record->id }}</p>
                <p>Tên khách hàng: {{ $record->Order_delivery->name }}</p>
                <p>Địa chỉ: {{ $record->Order_delivery->address }}</p>
                <p>Số điện thoại: {{ $record->Order_delivery->phone }}</p>
                <p>Tình trạng đơn hàng: {{ ($record->status == 0 )?"Chưa xác nhận" : "Đã xác nhận"}}</p>
                <p>Tổng tiền: {{ number_format($record->total) }}</p>
            </div>
            <div class="m-t-25">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($record->order_detail as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price ) }}</td>
                                <td>{{ $item->qty }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if( $record->status == 0)
            <a href="{{ route('accept_order', $record->id) }}" class="btn btn-primary">xác nhận đơn hàng</a>
            @endif
        </div>
    </div>
</div>
@endsection