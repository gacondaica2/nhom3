@extends('backend.template')
@section('content')
<div class="main-content">
    <div class="page-header no-gutters has-tab">
        <h2 class="font-weight-normal">{{ $item->title }}</h2>
    </div>
    @include('backend.messages.messages')
    <div class="container">
        <div class="tab-content m-t-15">
            <div class="tab-pane fade show active" id="tab-account" >
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $item->title }}</h4>
                    </div>
                    <div class="card-body">
                        <hr class="m-v-25">
                        <form  action="{{ route('edit_post_product', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Tiêu đề:</label>
                                    <input type="text" name="title" value="{{ $item->title }}" class="form-control" id="title" placeholder="Tiêu đề">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Mã sản phẩm:</label>
                                    <input type="text" name="sku" value="{{ $item->sku }}" class="form-control" id="sku" placeholder="Mã sản phẩm">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Giá:</label>
                                    <input type="number" name="price" value="{{ $item->price }}" class="form-control" id="title" placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="font-weight-semibold">Giá khuyến mãi(nếu có):</label>
                                    <input type="number" name="price_sale" value="{{ $item->price_sale }}" class="form-control" id="title" placeholder="Giá khuyễn mãi">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold" for="">Danh mục Chính</label>
                                    @if( isset($parent) )
                                    <select name="category" id="childrent" class="form-control parent-category">
                                        @foreach($parent as $parent_item)
                                        <option value="{{ $parent_item->id }}" {{ ($parent_item->id == $item->category_id) ? 'selected': "" }}>{{ $parent_item->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold" for="">Danh mục con</label>
                                    @if( isset($sub_category) ) 
                                    <select name="childrent" id="childrent" class="form-control childrent-category">
                                        @foreach($sub_category as $childrent)
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
                                    <input type="text" name="qty" value="{{ $item->qty }}" class="form-control" id="qty" placeholder="Số lượng">
                                </div>
                                <div class="col-md-12">
                                    <textarea name="editor"id="editor">{!! $item->content !!}</textarea>
                                </div>
                                <div class="col-md-12 mb-3"></div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Khối lượng(gram):</label>
                                    <input type="number" name="weight" value="{{ $item->weight }}" class="form-control" id="weight" placeholder="Khối lượng sản phẩm">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Chiều cao(cm):</label>
                                    <input type="number" name="height" class="form-control" value="{{ $item->height }}" id="weight" placeholder="chiều cao sản phẩm">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Chiều rộng(cm):</label>
                                    <input type="number" name="width" class="form-control" id="weight" value="{{ $item->width }}" placeholder="chiều rộng sản phẩm">
                                </div>
                                <div class="form-group col-md-12"><h2>Thông số cấu hình</h2> </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Hãng sản xuất(*):</label>
                                    @if( isset($manufacturers) )
                                    <select name="manufacturers" id="childrent" class="form-control">
                                        @foreach($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Kích thước(*):</label>
                                    @if( isset($sizes) )
                                    <select name="size" id="childrent" class="form-control">
                                        @foreach($sizes as $size)
                                        <option value="{{ $size->id }}">{{ $size->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Trọng lượng(*):</label>
                                    @if( isset($weights) )
                                    <select name="weight_option" id="childrent" class="form-control">
                                        @foreach($weights as $weight)
                                        <option value="{{ $weight->id }}">{{ $weight->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Bộ nhớ đệm / Ram(*):</label>
                                    @if( isset($internalmemorys) )
                                    <select name="internalmemory" id="childrent" class="form-control">
                                        @foreach($internalmemorys as $internalmemory)
                                        <option value="{{ $internalmemory->id }}">{{ $internalmemory->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Bộ nhớ trong(*):</label>
                                    @if( isset($rams) )
                                    <select name="ram" id="childrent" class="form-control">
                                        @foreach($rams as $ram)
                                        <option value="{{ $ram->id }}">{{ $ram->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Loại SIM(*):</label>
                                    @if( isset($sims) )
                                    <select name="sim" id="childrent" class="form-control">
                                        @foreach($sims as $sim)
                                        <option value="{{ $sim->id }}">{{ $sim->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Loại màn hình(*):</label>
                                    @if( isset($screens) )
                                    <select name="screen" id="childrent" class="form-control">
                                        @foreach($screens as $screen)
                                        <option value="{{ $screen->id }}">{{ $screen->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Kích thước màn hình(*):</label>
                                    @if( isset($screensizes) )
                                    <select name="screensize" id="childrent" class="form-control">
                                        @foreach($screensizes as $screensize)
                                        <option value="{{ $screensize->id }}">{{ $screensize->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Độ phân giải màn hình(*):</label>
                                    @if( isset($screenresolutions) )
                                    <select name="screenresolution" id="childrent" class="form-control">
                                        @foreach($screenresolutions as $screenresolution)
                                        <option value="{{ $screenresolution->id }}">{{ $screenresolution->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Hệ điều hành(*):</label>
                                    @if( isset($operatingsystems) )
                                    <select name="operatingsystem" id="childrent" class="form-control">
                                        @foreach($operatingsystems as $operatingsystem)
                                        <option value="{{ $operatingsystem->id }}">{{ $operatingsystem->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="font-weight-semibold">Pin(*):</label>
                                    @if( isset($pins) )
                                    <select name="pin" id="childrent" class="form-control">
                                        @foreach($pins as $pin)
                                        <option value="{{ $pin->id }}">{{ $pin->title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                <div class="form-group col-md-3">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="input-parent btn font-weight-semibold ">Chọn ảnh đại diện
                                        <input type="file" class="custom-file-input" name="avatar">
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="input-parent btn font-weight-semibold">Chọn ảnh mô tả
                                        <input type="file" class="custom-file-input" name="media[]" multiple="multiple">
                                    </label>
                                </div>
                                <div class="form-group col-md-3">
                                    <img  style="width: 300px; height:300px;" src="/storage/images/{{ $item->media->title }}" alt="image">
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="font-weight-semibold">Description(SEO):</label>
                                    <input type="text" value="{{ $item->description }}" name="description" class="form-control" id="title" placeholder="Description..." autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection