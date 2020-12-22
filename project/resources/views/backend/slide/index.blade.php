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
        <div class="m-t-25">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $img)
                            <tr>
                                <td>
                                    <img width="200px" height="100px" src="{{ url('storage')}}/images/{{ $img->title }}" alt="">
                                </td>
                                <td>{{ $img->title }}</td>
                                <td><a class="btn btn-outline-primary" href="{{ route('edit_slide', $img->id) }}">edit</a></td>
                                <td><a class="btn btn-outline-primary" href="{{ route('delete_slide', $img->id) }}" >delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection