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
                            <th>Hình</th>
                            <th>Tên</th>
                            <th>description</th>
                            <th>Sửa</th>
                            <th>Xoá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if( count($records) > 0)
                            @foreach($records as $record)
                                <tr>
                                    <td>
                                        <img width="50px" height="50px" src="{{ $record->media->img }}" alt="{{ $record->media->img }}">
                                    </td>
                                    <td>{{ $record->title }}</td>
                                    <th>{{ $record->description }}</th>
                                    <td><a class="btn btn-outline-primary" href="{{ route('edit_page', $record->id) }}">edit</a></td>
                                    <td><a class="btn btn-outline-primary" href="{{ route('delete_page', $record->id) }}" >delete</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection