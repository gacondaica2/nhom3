@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Danh sach sản phẩm</h2>
        <div class="header-sub-title col-md6">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            <nav>
        </div>
    </div>
    @include('backend.messages.messages')
    <div class="card">
        <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Tất cả sản phẩm</h4>
                <p>mô tả danh mục sản phẩm(description)</p>
            </div>
            <div class="col-md-6">
                <nav class="navbar navbar-light">
                    <form action="{{ route('search_product') }}" method="POST" class="form-inline">
                        @csrf
                        <input class="form-control mr-sm-2" name="name" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit">Tìm</button>
                    </form>
                </nav>
            </div>
        </div>
            <div class="m-t-25">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Mã sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá </th>
                            <th>Giá khuyễn mãi</th>
                            <th>Chỉnh sửa</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( count($records) > 0)
                            @foreach( $records as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->sku }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->price_sale }}</td>
                                <td><a href="{{ route('edit_product', $item->id) }}">edit</a></td>
                                <td><a onclick="return confirm('Bạn có chắc muốn xoá?')" href="{{ route('delete_product', $item->id) }}">Delete</a></td>
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