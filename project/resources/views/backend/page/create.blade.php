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
                        <h4 class="card-title">Thêm bài viết mới</h4>
                    </div>
                    <div class="card-body">
                        <hr class="m-v-25">
                        <form enctype="multipart/form-data" action="{{ route('create_page_post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label class="font-weight-semibold">Nội dung:</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Tiêu đề">
                                </div>
                                <div class="col-md-12">
                                    <textarea style="height: 300px;" name="content" id="editor"></textarea>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold input-parent btn">Chọn ảnh đại diện
                                        <input type="file" class="custom-file-input" name="avatar">
                                    </label>
                                </div>
                                <div class="form-group col-md-9"></div>
                                <div class="form-group col-md-8">
                                    <label class="font-weight-semibold">Mô tả đơn giản(Không quá 200 kí tự):</label>
                                    <input type="text" name="description" class="form-control" id="title" placeholder="Tiêu đề">
                                </div>
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