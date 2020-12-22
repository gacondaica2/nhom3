@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header no-gutters has-tab">
        <h2 class="font-weight-normal">Thêm sản phẩm mới </h2>
    </div>
    @include('backend.messages.messages')
    <div class="container">
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="tab-account" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm sản phẩm mới</h4>
                    </div>
                    <div class="card-body">
                        <hr class="m-v-25">
                        <form enctype="multipart/form-data" action="{{ route('create_product_post') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Tiêu đề:</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Tiêu đề">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Mã sản phẩm:</label>
                                    <input type="text" name="sku" class="form-control" id="sku" placeholder="Mã sản phẩm">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Giá:</label>
                                    <input type="number" name="price" class="form-control" id="title" placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Giá khuyến mãi(nếu có):</label>
                                    <input type="number" name="price_sale" class="form-control" id="title" placeholder="Giá khuyễn mãi">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold" for="">Danh mục Chính</label>
                                    @if( isset($parent) )
                                    <select name="category" id="childrent" class="form-control parent-category">
                                        @foreach($parent as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold" for="">Danh mục Phụ</label>
                                    @if( isset($record->childrent) )
                                    <select name="childrent" id="childrent" class="form-control childrent-category">
                                        @foreach($record->childrent as $childrent)
                                        <option value="{{ $childrent->id }}">{{ $childrent->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="font-weight-semibold" for="dob">Trạng thái(bật/tắt):</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Bật</option>
                                        <option value="0">Tắt</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="font-weight-semibold">Số lượng sản phẩm:</label>
                                    <input type="number" name="qty" class="form-control" id="title" placeholder="Số lượng">
                                </div>
                                <div class="form-group col-md-12"><h2>Thông số giao hàng</h2> </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Khối lượng(gram):</label>
                                    <input type="number" name="weight" class="form-control" id="weight" placeholder="Khối lượng sản phẩm">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Chiều cao(cm):</label>
                                    <input type="number" name="width" class="form-control" id="weight" placeholder="chiều cao sản phẩm">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Chiều rộng(cm):</label>
                                    <input type="number" name="height" class="form-control" id="weight" placeholder="chiều rộng sản phẩm">
                                </div>
                                <div class="form-group col-md-3"> </div>
                                <div class="form-group col-md-12"><h2>Thông số cấu hình</h2> </div>
                                @foreach($option as $childrent_option)
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">{{ $childrent_option->title }}</label>
                                    @if( count($childrent_option->childrent) > 0 )
                                    <select name="{{ $childrent_option->title }}"  class="form-control">
                                        @foreach($childrent_option->childrent as $detail_option)
                                        <option value="{{ $detail_option->id }}">{{ $detail_option->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                @endforeach
                                <div class="col-md-12">
                                    <textarea style="height: 300px;" name="editor" id="editor"></textarea>
                                </div>
                                <div class="col-md-12" style="height:20px"></div>
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-3">
                                        <label class="input-parent btn font-weight-semibold ">Chọn ảnh đại diện
                                            <input type="file" class="custom-file-input" name="avatar">
                                        </label>
                                    </div>
                                    <div class="form-group col-md-6"></div>
                                    <div class="form-group col-md-3">
                                        <label class="input-parent btn font-weight-semibold">Chọn ảnh mô tả
                                            <input type="file" class="custom-file-input" name="media[]" multiple="multiple">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <p>(*) bắt buộc phải có đầy đủ</p>
                            <div style="height: 30px;"></div>
                            <div class="form-group col-md-8">
                                <label class="font-weight-semibold">Description(SEO):</label>
                                <input type="text" name="description" class="form-control" id="title" placeholder="Description..." autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection