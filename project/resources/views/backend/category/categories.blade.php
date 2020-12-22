@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Danh sach sản phẩm</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            </nav>
        </div>
    </div>
    @include('backend.messages.messages')
    <div class="card">
        <div class="card-body">
            <h5>Tất cả danh mục</h5>
            <p>mô tả (description)</p>
            <div class="m-t-25">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="font-weight-semibold" for="dob"><h3>Tất cả danh mục</h3></label>
                    <select name="status" id="status" class="form-control">
                        @foreach( $category as $key => $value)
                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <h5>Danh mục</h5>
                        </div>
                        <div class="form-group col-md-2">
                            <h5>Sửa</h5>
                        </div>
                        <div class="form-group col-md-2">
                            <h5>Xoá</h5>
                        </div>
                    </div>
                    <div class="form-row list-option category_childrent">
                            <div class="form-group col-md-8">
                                {{ $record->title }}
                            </div>
                            <div class="form-group col-md-2">
                                <a href="{{ route('edit_category', $record->id) }}">Sửa</a>
                            </div>
                            <div class="form-group col-md-2">
                                <a href="{{ route('delete_category', $record->id) }}"  onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</a>
                            </div>
                        @foreach($record->childrent as $childrent)
                            <div class="form-group col-md-8">
                                {{ $childrent->title }}
                            </div>
                            <div class="form-group col-md-2">
                                <a href="{{ route('edit_category', $childrent->id) }}">Sửa</a>
                            </div>
                            <div class="form-group col-md-2">
                                <a href="{{ route('delete_category', $childrent->id) }}" onclick="return confirm('Bạn có chắc muốn xoá?')">Xoá</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> 
            </div>
        </div>
    </div>
</div>
@endsection