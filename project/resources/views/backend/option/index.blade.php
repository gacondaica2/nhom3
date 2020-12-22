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
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Manufacturer:</label>
                            <select name="status" id="status" class="form-control">
                                @foreach($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Hãng sản xuất:</label>
                            <select name="status" id="status" class="form-control">
                                @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">rams:</label>
                            <select name="ram" id="status" class="form-control">
                                @foreach($rams as $ram)
                                <option value="{{ $ram->id }}">{{ $ram->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Bộ nhớ trong:</label>
                            <select name="internalmemory" id="status" class="form-control">
                                @foreach($internalmemorys as $internalmemory)
                                <option value="{{ $internalmemory->id }}">{{ $internalmemory->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Trọng lượng:</label>
                            <select name="weight" id="status" class="form-control">
                                @foreach($weights as $weight)
                                <option value="{{ $weight->id }}">{{ $weight->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Loại SIM:</label>
                            <select name="status" id="status" class="form-control">
                                @foreach($sims as $sim)
                                <option value="{{ $sim->id }}">{{ $sim->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Kích thước màn hình:</label>
                            <select name="screensize" id="status" class="form-control">
                                @foreach($screensizes as $screensize)
                                <option value="{{ $screensize->id }}">{{ $screensize->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Độ phân giải màn hình:</label>
                            <select name="screenresolution" id="status" class="form-control">
                                @foreach($screenresolutions as $screenresolution)
                                <option value="{{ $screenresolution->id }}">{{ $screenresolution->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Loại màn hình:</label>
                            <select name="screen" id="status" class="form-control">
                                @foreach($screens as $screen)
                                <option value="{{ $screen->id }}">{{ $screen->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">Hệ điều hành:</label>
                            <select name="operatingsystem" id="status" class="form-control">
                                @foreach($operatingsystems as $operatingsystem)
                                <option value="{{ $operatingsystem->id }}">{{ $operatingsystem->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="dob">pin:</label>
                            <select name="pin" id="status" class="form-control">
                                @foreach($pins as $pin)
                                <option value="{{ $pin->id }}">{{ $pin->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection