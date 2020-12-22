@extends('frontend.template')
@section('content')
<main class="page-content">
    <div class="account-page-area">
        <div class="container">
        @include('frontend.messages.messages')
            <div class="main">
                <div class="page-header">
                    <h2 class="header-title">Đơn Hàng Của Bạn</h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="m-t-25">
                            <p>ID: {{ $record->id }}</p>
                            <p>Tên khách hàng: {{ $record->Order_delivery->name }}</p>
                            <p>Địa chỉ: {{ $record->Order_delivery->address }}</p>
                            <p>Số điện thoại: {{ $record->Order_delivery->phone }}</p>
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
                            <p>Tình trạng đơn hàng: {{ ($record->status == 0 )?"Chưa xác nhận" : "Đã xác nhận"}}</p>
                            <p>Tổng tiền: {{ number_format($record->total) }}₫</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection