@extends('pattern')

@section('title', 'Write acticles')

@push('styles')
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/image@2.3.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script><!-- Image -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/nested-list@latest"></script><!-- List -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/raw@latest"></script><!-- Raw -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->
    <link rel="stylesheet" href="/css/write_acticles.css">
@endpush

@section('menu-nav-body')
    @push('info-web')
        <h2 style="font-size: 30px; padding-top: 30px;">Tạo bài viết</h2>
        <p style="color: rgb(255, 59, 59); padding: 30px 0;">Những nhà báo đích thực là những người cống hiến hết
            mình cho công việc của mình, đặt trách nhiệm của
            mình lên hàng đầu và luôn cố gắng để đưa tin chính xác và đầy đủ nhất đến với độc giả.</p>

        <div class="container-item">
            <p id="text-item" data-categorie="">Chọn thể loại:</p>
            <ul class="list-item">
                <li class="item" data-categorie="1">Thế giới</li>
                <li class="item" data-categorie="2">Kinh tế</li>
                <li class="item" data-categorie="3">Thể thao</li>
                <li class="item" data-categorie="4">Giải trí</li>
                <li class="item" data-categorie="5">KH-CN</li>
                <li class="item" data-categorie="6">VH-XH</li>
                <li class="item" data-categorie="7">Pháp luật</li>
                <li class="item" data-categorie="8">Giáo dục</li>
                <li class="item" data-categorie="9">An ninh</li>
                <li class="item" data-categorie="10">Sức khỏe</li>
            </ul>
            <i class="fa-solid fa-angle-down" style="cursor: pointer;"></i>
        </div>
        <div class="container" style="background-color: #e8e6e3">
            <h3></h3>
            <div id="editorjs"></div>
        </div>
        <ul class="list-btn">
            <li class="btn">Xóa</li>
            <li class="btn">Bản nháp</li>
            <li class="btn">Đăng</li>
        </ul>
    @endpush
    @parent
@endsection

@section('footer')
    @parent
@endsection


@push('js')
    <script src="/js/editerjs.js"></script>
@endpush
