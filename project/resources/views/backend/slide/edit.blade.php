@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Slide</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            </nav>
        </div>
    </div>
    @include('backend.messages.messages')
    <div class="card">
        <div class="card-body">
        <div class="m-t-25">
            <form action="{{ (!is_null($record)) ? route('update_slide', $record->id) : route('create_slide') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $type }}" name="type">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="font-weight-semibold" for="dob">Tên hình :</label>
                        <input type="text" value="{{ (!is_null($record)) ? $record->title : '' }}" name="title" class="form-control" id="title" placeholder="Tên Option">
                    </div>
                    <div class="form-group col-md-8">
                        <label class="input-parent btn font-weight-semibold" for="dob">Chọn hình khác
                            <input type="file" class="custom-file-input" name="media">
                        </label>
                    </div>
                    @if( !is_null($record))
                    <div class="form-group col-md-12">
                        <img src="/storage/images/{{ $record->title }}" width="300px" height="300px" alt="">
                    </div>
                    @endif
                    <button class="btn" type="submit">{{ !is_null($record) ?'Cập nhật' : 'Thêm' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection