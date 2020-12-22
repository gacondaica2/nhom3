@extends('frontend.template')
@section('content')
<div class="list-view_area latest-blog_area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <div class="kenne-blog-sidebar-wrapper">
                    <div class="kenne-blog-sidebar">
                        <h4 class="kenne-blog-sidebar-title">Tìm kiếm</h4>
                        <div class="search-form_area">
                            <form class="search-form" action="{{ route('search_blog') }}" method="POST">
                                @csrf
                                <input type="text" name="search" class="search-field" placeholder="Tên bài viết">
                                <button type="submit" class="search-btn"><i class="ion-ios-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row blog-item_wrap">
                    <div class="col-12">
                        @if( count($records) > 0)
                            @foreach($records as $value)
                            <div class="blog-item row">
                                <div class="blog-img col-md-7">
                                    <a href="{{ route('detail_blog', $value->id) }}">
                                        <img src="{{ $value->media->img }}" alt="{{ $value->media->img }}">
                                    </a>
                                </div>
                                <div class="blog-content col-md-5">
                                    <h3 class="heading">
                                        <a href="{{ route('detail_blog', $value->id) }}">{{ $value->title }}</a>
                                    </h3>
                                    <p class="short-desc">
                                    {{ $value->description }}
                                    </p>
                                    <div class="blog-meta">
                                        <p>Thời gian: {{ $value->updated_at}}</p>
                                    </div>
                                </div>
                            </div>
                            <div style="height: 20px;"></div>
                            @endforeach
                        @else 
                        <div class="blog-item">
                            <h4>Không có bài viết</h4>
                        </div>
                        @endif
                    </div>
                    {{ $records->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection