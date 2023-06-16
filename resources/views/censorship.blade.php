@extends('pattern')

@section('title', 'Censorship')

@push('styles')
    <link rel="stylesheet" href="/css/censorship.css">
    <script>
        fetch('http://127.0.0.1:8000/api/role/get')
        .then(response => response.json())
        .then(role => {
        console.log(role)
        if (role.role === 'reader' || role.role === 'editor')
        location.href = 'http://127.0.0.1:8000/index/index'
        })
    </script>
@endpush

@section('menu-nav-body')
    @push('info-web')
        <h2 style="text-align: center; font-size: 30px; margin-top: 30px;">Danh sách bài viết đợi kiểm duyệt</h2>
            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0 0 0;"></div>
            <div class="column">
                <div class="column-heading">
                    <input type="checkbox" name="all" id="">
                    <p class="column-author">Tác giả</p>
                </div>
                <p class="column-heading">Tiêu đề</p>
                <p class="column-heading">Thời gian</p>
                <input type="text" name="column-search" id=""
                    placeholder="Tìm kiếm tên bài viết...">
                <i class="fa-solid fa-magnifying-glass search-article-2"></i>
            </div>
            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 0 0 30px 0;"></div>

            <div class="list-censorship"></div>

            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 30px 0 0 0;"></div>
            <div class="censorship-all">
                <div>
                    <span>Đã chọn:</span>
                    <span class="total-posts">0</span>
                </div>
                <button class="censhorship-all-posts">Duyệt tất cả</button>
            </div>
            <div style="width: 100%; height: 2px; background-color: var(--color); margin: 0 0 30px 0;"></div>
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
    <script src="/js/censorship.js"></script>
@endpush
