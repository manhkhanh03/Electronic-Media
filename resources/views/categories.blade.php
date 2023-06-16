@extends('pattern')

@section('title', $categories)

@push('styles')
    <link rel="stylesheet" href="/css/categories.css">
    <style>
        
    </style>
@endpush

@section('menu-nav-body')
    @push('info-web')
        <h1 id="categories" data-cate-id="{{ $cate_id }}">Tin {{ $categories }}</h1>
        <div class="posts">
            <div class="post-left">
                <ul class="list-post"></ul>
            </div>
            <div class="post-right">
                <h3>Truy cập nhiều nhất</h3>
                <ul class="list-post-topic"></ul>
            </div>
        </div>
    @endpush
    @parent
@endsection

@section('footer')
    @parent
@endsection

@section('codejs')
    @parent
@endsection

@push('js')
    <script src="/js/postsCategories.js"></script>
@endpush