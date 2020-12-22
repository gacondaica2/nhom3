@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header no-gutters has-tab">
        <h2 class="font-weight-normal">Thêm danh mục</h2>
    </div>
    @include('backend.messages.messages')
    <div class="container">
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="tab-account" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thêm danh mục</h4>
                    </div>
                    <div class="card-body">
                        <hr class="m-v-25">
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Tiêu đề:</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Tiêu đề">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="font-weight-semibold" for="dob">Cha:</label>
                                    <input type="checkbox" id="parent-category" class="parent-category" name="parent">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold" for="">Danh mục cha(Nếu có)</label>
                                    @if( isset($parent) )
                                    <select name="childrent" id="childrent" class="form-control childrent-category">
                                        <option value="0">Không có</option>
                                        @foreach($parent as $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
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
                                <div class="form-group col-md-12">
                                    <label class="font-weight-semibold">Description(Mô tả để SEO):</label>
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