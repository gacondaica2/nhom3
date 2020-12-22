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
                <div class="blog-item">
                    <div class="blog-img">
                        <a href="{{ route('detail_blog', $record->id) }}">
                            <img width="700" height="500" src="{{ $record->media->img }}" alt="{{ $record->media->img }}">
                        </a>
                    </div>
                    <div class="blog-content">
                        <h3 class="heading">
                            <h4><a href="{{ route('detail_blog', $record->id) }}">{{ $record->title }}</a></h4>
                        </h3>
                        <p class="short-desc">
                        {{ $record->description }}
                        </p>
                        <div class="blog-meta">
                            <p>Thời gian: {{ $record->updated_at}}</p>
                        </div>
                    </div>
                </div>
                <div class="kenne-blog-blockquote">
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
    <p>{!! $record->content !!}</p>
    <h4>Bình Luận</h4>
    <div class="fb-comments" data-href="http://storemobile.xyz/news/{{ $record->title }}" data-numposts="5"></div>
    </div>    
</div>
@endsection