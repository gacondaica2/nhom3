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
                    <form action="{{ route('edit_option',  $record->id ) }}" method="POST">
                        @csrf
                        <input type="text" name="title" value="{{ $record->title }}" class="form-control" id="option" placeholder="option">   
                        <input type="hidden" name="position" value="{{ $position }}">
                        <button type="submit" class="btn">Sửa</button>
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection