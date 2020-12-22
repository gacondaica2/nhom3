@extends('backend.template')
@section('content')
@if( isset($category))
<div class="main-content">
    <div class="page-header no-gutters has-tab">
        <h2 class="font-weight-normal">{{ $category->title }}</h2>
    </div>
    @include('backend.messages.messages')
    <div class="container">
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="tab-account" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $category->title }}</h4>
                    </div>
                    <div class="card-body">
                        <hr class="m-v-25">
                        <form action="{{ route('edit_category_post', $category->id ) }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Tiêu đề:</label>
                                    <input type="text" value="{{ $category->title }}" name="title" class="form-control" id="title" placeholder="Tiêu đề">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="font-weight-semibold" for="dob">Cha:</label>
                                    <input type="checkbox" id="parent-category" class="parent-category" name="parent" {{ ($category->parent_id == 0) ? "checked" : "" }}>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold" for="">Danh mục cha(Nếu có)</label>
                                    @if( isset($parent) )
                                    <select name="childrent" id="childrent" class="form-control childrent-category">
                                        @foreach($parent as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $category->parent_id ? "selected" : ''}}>{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="font-weight-semibold" for="dob">Trạng thái(bật/tắt):</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ ($category->status == 1) ? "selected": ""}}>Bật</option>
                                        <option value="0" {{ ($category->status == 0) ? "selected": ""}}>Tắt</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection