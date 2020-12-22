<!DOCTYPE html>
<html>
<head>
    <title>hoá đơn</title>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h4>Đơn Hàng Của Bạn</h4>
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
                <p>Tổng tiền: {{ number_format($record->total) }}₫</p>
            </div>
        </div>
    </div>
</body>
</html>