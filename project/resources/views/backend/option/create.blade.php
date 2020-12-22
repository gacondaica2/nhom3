@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header">
        <h2 class="header-title">Option</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="{{ route('home') }}" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
            </nav>
        </div>
    </div>
    @include('backend.messages.messages')
    <div class="card">
        <div class="card-body">
            <h4>Option</h4>
            <div class="m-t-25">
                <div class="card-body">
                    <form action="{{ route('create_option') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label class="font-weight-semibold" for="dob">Chọn Option:</label>
                                <select name="option" id="status" class="form-control option-click">
                                    @foreach(\Helper::Option() as $key => $value )
                                    <option value="{{ $key }}">{{  $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        Tên
                                    </div>
                                    <div class="form-group col-md-2">
                                        Xoá
                                    </div>
                                    <div class="form-group col-md-2">
                                        Sửa
                                    </div>
                                </div>
                                <div class="form-row list-option">
                                    @foreach($options as $option)
                                        <div class="form-group col-md-8">
                                            {{ $option->title }}
                                        </div>
                                        <div class="form-group col-md-2">
                                            <a href="{{ route('delete_option', ['id' => $option->id, 'option' => $position ]) }}">Xoá</a>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <a href="{{ route('edit_option_view', ['id' => $option->id, 'option' => $position ]) }}">Sửa</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="font-weight-semibold" for="dob">Tên Option mới :</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Option mới">
                                <button class="btn" type="submit">Thêm</button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection